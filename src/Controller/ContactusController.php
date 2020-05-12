<?php

declare(strict_types=1);
namespace App\Controller;

class ContactusController extends AppController
{	
	public function contact()
	{	
		$contact = $this->Contactus->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $data=$this->request->getData();
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");

            $contact = $this->Contactus->newEntity($data);
            if ($this->Contactus->save($contact)) 
            {
                $this->Flash->success(__('Your response has been added.'));

                return $this->redirect(['action' => 'homepage','controller'=>'Rooms']);
            }
            $this->Flash->error(__('Your response could not be added. Please, try again.'));
        }
        $this->set('contact', $contact);
	}
}
?>
