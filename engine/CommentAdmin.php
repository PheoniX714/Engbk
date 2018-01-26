<?PHP 

require_once('api/Engine.php');

########################################
class CommentAdmin extends Engine
{
	function fetch()
	{	
		$comment = new stdClass;
		$answer = new stdClass;
		if($this->request->method('POST'))
		{
			$answer->id = $this->request->post('id', 'integer');
			$answer->comment_id = $this->request->post('comment_id', 'integer');
			$answer->text = $this->request->post('text');
			
			if(empty($answer->id) && !$a = $this->comments->get_answer($answer->comment_id))
			{				
	  			$answer->id = $this->comments->add_answer($answer);
				$answer = $this->comments->get_answer($answer->comment_id);
				$comment = $this->comments->get_comment($answer->comment_id);
				$this->templates->assign('message_success', 'added');
			}
			else
			{
				$this->comments->update_answer($answer->id, $answer);
				$answer = $this->comments->get_answer($answer->comment_id);
				$comment = $this->comments->get_comment($answer->comment_id);
				$this->templates->assign('message_success', 'updated');
			}
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			if(!empty($id)){
				$comment = $this->comments->get_comment(intval($id));
				$answer = $this->comments->get_answer(intval($id));
			}
		}

		$this->templates->assign('comment', $comment);
		$this->templates->assign('answer', $answer);
		
		return $this->templates->fetch('comment.tpl');
	}
}


?>