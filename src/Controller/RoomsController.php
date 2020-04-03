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
        $room = $this->paginate($this->Rooms); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'room' => $this -> paginate( $this ->Rooms )));
    }   
    public function view($id = null)
    {   $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'room' => $room));
    }
    public function add()
    {   $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $room = $this->Rooms->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");
            $room = $this->Rooms->newEntity($data);
            if ($this->Rooms->save($room)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
         $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
        ])->where(['status IN' => ['0','1']]);
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'pg_id' => $pg_id, 'room' => $room));
    }
    public function edit($id = null)
    {   $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $room = $this->Rooms->patchEntity($room, $data);
            if ($this->Rooms->save($rooms)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
        ])->where(['status IN' => ['0','1']]);
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'pg_id' => $pg_id, 'room' => $room));
        $this->set(compact('rooms'));
    }
    public function changeupload($id=null)
    {  
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $room = $this->Rooms->patchEntity($room, $data);
            if ($this->Rooms->save($room)) 
            {
                $this->Flash->success(__('The upload has been saved.'));
                    return $this->redirect(['action' => 'edit',$id]);
            }
            $this->Flash->error(__('The upload could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
    }
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
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }
    public function addbypg()
    {   $this->loadModel('PgDetails');
        $rooms = $this->Rooms->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");
            $rooms = $this->Rooms->newEntity($data);
            if ($this->Rooms->save($rooms)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'mypg']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
                ])->where(['owner_id' => 19,'status IN' => ['0','1']]);
        $pgs = $this->PgDetails->findByOwnerId('19')->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => 19]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs , 'room'=> $room,'pg_id'=> $pg_id ,'rooms'=>$rooms));
        $this->set(compact('rooms'));
    }
    public function indexforpg()
    {   
        $this->loadModel('PgDetails');
        $pgs = $this->PgDetails->findByOwnerId('19')->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => 19]);
        $roomm=0;$room=0;$j=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }        
        $rooms =$this->paginate($this->Rooms->find('all', [
                                                    'conditions' => [
                                                    'pg_id IN' => [ $this->PgDetails->find('list')->where(['owner_id' => 19]) ] 
                                                                    ]
                                                            ]
                                                    )
                                );
        $this->set(array('pgs'=> $pgs , 'room'=> $room ,'rooms'=>$rooms));
        $this->set(compact('rooms'));
    }   
    public function editbypg($id = null)
    {   $this->loadModel('PgDetails');
        $rooms = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $rooms = $this->Rooms->patchEntity($rooms, $data);
            if ($this->Rooms->save($rooms)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
                ])->where(['owner_id' => 19],['status IN' => ['0','1']]);
        $pgs = $this->PgDetails->findByOwnerId('19')->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => 19]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs , 'room'=> $room,'pg_id'=> $pg_id ,'rooms'=>$rooms));
        $this->set(compact('rooms'));
    }
    public function viewbypg($id = null)
    {   
        $this->loadModel('PgDetails');
        $rooms = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $pgs = $this->PgDetails->findByOwnerId('19')->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => 19]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs , 'room'=> $room,'rooms'=>$rooms));
        $this->set(compact('rooms'));
    }

}
