<?php

declare(strict_types=1);
namespace App\Controller;

class RoomsController extends AppController
{
    public $paginate = [
        'maxLimit' => 5
    ];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function index()
    {   
    $this->loadModel('Users');
    $this->loadModel('PgDetails');

    $room = $this->paginate($this->Rooms/*,[
        'contain' => ['Userroles']]*/); 
    $pgs = $this->PgDetails->find()->count();
    $rooms = $this->Rooms->find()->count();
    $totalusers = $this->Users->find()->count();
    $users= $this->Users->findByRole('1');
    $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers , 'room' => $this -> paginate( $this ->Rooms )));
    }   

    public function view($id = null)
    {   $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $totalusers = $this->Users->find()->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers , 'room' => $room));
    }

    public function add()
    {    $this->loadModel('PgDetails');
         $this->loadModel('Users');
        $room = $this->Rooms->newEmptyEntity();
        if ($this->request->is('post')) {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $room = $this->Rooms->newEntity($data);
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
         $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'firstname'
        ]);
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $totalusers = $this->Users->find()->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers ,'pg_id' => $pg_id, 'room' => $room));
    }
    // public function edit($id = null)
    // {   $this->loadModel('Userroles');
    //     $this->loadModel('Rooms');
    //     $user = $this->Users->get($id, [
    //         'contain' => [],
    //     ]);

    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $imgdata = $this->request->getData('image');
    //         $tmpName = $imgdata->getStream()->getMetadata('uri');
    //         $img=file_get_contents($tmpName);
    //         $data=$this->request->getData();
    //         $data['image']=$img;
    //         $user = $this->Users->patchEntity($user, $data);
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('The user has been modified.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be modified. Please, try again.'));
    //     }
    //     $roles = $this->Userroles->find('list', [ 
    //         'keyField' => 'id',
    //         'valueField' => 'user_rolename'
    //     ]);
    //     $pgs = $this->Users->findByRole('1')->count();
    //     $rooms = $this->Rooms->find()->count();
    //     $totalusers = $this->Users->find()->count();
    //     $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers ,'roles' => $roles, 'user' => $user));
        
    // }
    public function block($id)
    {
            $room= $this->Rooms->get($id);
            $status=$room->status;
            $room->status=1-$status;
            if ($this->Rooms->save($room)) {
                if($room->status==0)
                    $this->Flash->success(__('The user has been blocked.'));
                else
                    $this->Flash->success(__('The user has been unblocked.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $this->Authentication->addUnauthenticatedActions(['login', 'add']);
}

     

}
