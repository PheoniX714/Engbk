<?PHP
require_once('api/Engine.php');

class FeatureAdmin extends Engine
{

	function fetch()
	{
		$feature = new stdClass;
		if($this->request->method('post'))
		{
			$feature->id = $this->request->post('id', 'integer');
			$feature->name = $this->request->post('name');
			$feature->in_filter = intval($this->request->post('in_filter'));
			$feature->language_id = intval($this->request->post('language_id'));
			$feature_categories = $this->request->post('feature_categories');

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
			$this->features->update_feature_categories($feature->id, $feature_categories);
		}
		else
		{
			$feature->id = $this->request->get('id', 'integer');
			$feature = $this->features->get_feature($feature->id);
		}

		$feature_categories = array();	
		if($feature)
		{	
			$feature_categories = $this->features->get_feature_categories($feature->id);
		}
		$categories = $this->categories->get_categories_tree();
		$this->templates->assign('categories', $categories);
		$this->templates->assign('feature', $feature);
		$this->templates->assign('feature_categories', $feature_categories);
		
		$languages = $this->languages->get_languages();
		$this->templates->assign('languages', $languages);
		
		return $this->body = $this->templates->fetch('products/feature.tpl');
	}
}




