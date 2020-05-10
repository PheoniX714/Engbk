<?PHP
require_once('api/Engine.php');

class FeatureAdmin extends Engine
{

	function fetch()
	{
		$feature = new stdClass;
		$translation = new stdClass;
		
		$language_id = $this->request->get('language_id', 'integer');
		if(empty($language_id))
			$language = $this->languages->get_main_language();
		else
			$language = $this->languages->get_language(intval($language_id));
		
		$main_language = $this->languages->get_main_language();
		if($this->request->method('post'))
		{
			$feature->id = $this->request->post('id', 'integer');
			$feature->in_filter = $this->request->post('in_filter', 'boolean');
			$feature_categories = $this->request->post('feature_categories');
						
			$translation->name = $this->request->post('name');
			
			if(empty($translation->language_id))
				$translation->language_id = $language->id;

			if(empty($feature->id))
			{
  				$feature->id = $this->features->add_feature($feature);
  				$feature = $this->features->get_feature($feature->id);
				$this->templates->assign('message_success', 'added');
  			}
			else
			{
				$this->features->update_feature($feature->id, $feature);
				$feature = $this->features->get_feature($feature->id);
				$this->templates->assign('message_success', 'updated');
			}
			
			if(!empty($feature->id)){
				$translation->feature_id = $feature->id;
				$translation->language_id = $language->id;
				
				if($this->features->delete_feature_translation($translation->feature_id, $translation->language_id)){
					$this->features->add_feature_translation($translation);
				}
				
				$translation = $this->features->get_feature_translation(intval($feature->id), intval($language->id));
			}
			
			$feature = (object)array_merge((array)$feature, (array)$translation);
			
			$this->features->update_feature_categories($feature->id, $feature_categories);
		}
		else
		{
			$feature->id = $this->request->get('id', 'integer');
			if(!empty($feature->id)){
				$feature = $this->features->get_feature($feature->id);
				$translation = $this->features->get_feature_translation(intval($feature->id), intval($language->id));
				$feature = (object)array_merge((array)$feature, (array)$translation);
			}
		}

		$feature_categories = array();	
		if($feature)
		{	
			$feature_categories = $this->features->get_feature_categories($feature->id);
		}
		$categories = $this->categories->get_categories_tree(false);
		$this->templates->assign('categories', $categories);
		$this->templates->assign('feature', $feature);
		$this->templates->assign('feature_categories', $feature_categories);
		
		$this->templates->assign('language', $language);
		
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);		
		return $this->body = $this->templates->fetch('products/feature.tpl');
	}
}