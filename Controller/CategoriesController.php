<?php 
class CategoriesController extends AppController {

    public function index() {
        $data = $this->Category->generateTreeList(
          null,
          null,
          null,
          '-'
        );
        pr($data); die;
		//echo $data[1]; die;		
    }
	
	public function add(){
		// pseudo controller code
		$data['Category']['parent_id'] = 3;
		$data['Category']['name'] = 'Skating';
		$this->Category->save($data);
	}
	
	public function edit(){
		// pseudo controller code
		// có thể đổi vị trí tree.
		// hoac edit field.
		$this->Category->id = 18; // id of Extreme knitting
		$this->Category->save(array('name' => 'tuan'));
	}
	
	public function get(){
		// pseudo controller code		
		//Select id From categoru Where name = 'Skating three' 
		$newParentId = $this->Category->field(
		  'id',
		  array('name' => 'Skating three')
		);

		$this->set('newParentId', $newParentId);
	}
	
	public function del(){
		// pseudo controller code
		$this->Category->id = 17;
		$this->Category->delete();
	}
	
	public function show(){
		//$allChildren = $this->Category->children(1); // a flat array with 11 items
		// -- or --
		$this->Category->id = 1;
		$allChildren = $this->Category->children(); // a flat array with 11 items

		// Only return direct children
		$directChildren = $this->Category->children(1, true); // a flat array with
														  // 2 items
		$this->set('allChildren', $allChildren);												  
		$this->set('directChildren', $directChildren);
														  
		//$totalChildren = $this->Category->childCount(1); // will output 11
		// -- or --
		$this->Category->id = 1;
		$totalChildren = $this->Category->childCount(); // will output 11

		// Only counts the direct descendants of this category
		$numChildren = $this->Category->childCount(1, true); // will output 2
		$this->set('numChildren', $numChildren);
		
		$parent = $this->Category->getParentNode(2); //<- id for fun
		// $parent contains All categories
		$this->set('parent', $parent);
		
		$parents = $this->Category->getPath(15);
		$this->set('parents', $parents);
	}
	
	// doi vi tri sort xuong.
	public function movedown($id = null, $delta = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
		   throw new NotFoundException(__('Invalid category'));
		}

		if ($delta > 0) {
			$this->Category->moveDown($this->Category->id, abs($delta));
		} else {
			$this->Session->setFlash(
			  'Please provide the number of positions the field should be' .
			  'moved down.'
			);
		}

		return $this->redirect(array('action' => 'index'));
	}
	
	//thay doi vi tri sort len.
	public function moveup($id = null, $delta = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
		   throw new NotFoundException(__('Invalid category'));
		}

		if ($delta > 0) {
			$this->Category->moveUp($this->Category->id, abs($delta));
		} else {
			$this->Session->setFlash(
			  'Please provide a number of positions the category should' .
			  'be moved up.'
			);
		}

		return $this->redirect(array('action' => 'index'));
	}
}
?>