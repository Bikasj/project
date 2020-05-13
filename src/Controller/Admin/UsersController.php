<?php
    namespace App\Controller\Admin;

    use App\Controller\Admin\AppController;
    use Cake\Auth\DefaultPasswordHasher;
    use Cake\Utility\Security;

    class UsersController extends AppController
{
    public $paginate = [
        'maxLimit' => 4
    ];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function changeuploaduser($id=null)
    {   
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The upload has been saved.'));
                    return $this->redirect(['action' => 'profile',$id]);
            }
            $this->Flash->error(__('The upload could not be saved. Please, try again.'));
        }
        $this->set('user',$user);
    }
    public function pgowners()
    {   
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $pgowner=$this -> paginate(  $this->Users->findByRole('1'));
        $count=1;
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners,'pending'=> $pending,'transients'=>$transients,'bookingrequest'=>$bookingrequest,'pgowner'=>$pgowner , 'users' => $users));
    }     
    public function transients()
    {
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $users = $this->Users->findByEmail('vj603@gmail.com'); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $user= $this->Users->findByRole('2');
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'pending'=>$pending, 'bookingrequest'=>$bookingrequest,'users'=>$users,'user' => $this -> paginate( $this ->Users ->findByRole('2'))));
    }
    public function viewtransients($id=null)
    {   
        $this->loadModel('Userroles');
        $this->loadModel('PgDetails');
        $this->loadModel('Rooms');
        $this->loadModel('Payments');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $no_room=0;
        $room_id=$this->Payments->findByTransientuserId($id)->select('room_id')->first();
        if($room_id=="") 
            $no_room=1;
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $role= $this->Userroles->findById($user->role)->firstOrFail();
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('room_id'=>$room_id,'pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'bookingrequest'=>$bookingrequest,'role' => $role,'users' => $users,'no_room'=>$no_room, 'pending' => $pending,'user' => $user));
    }
    public function viewpgowners($id=null)
    {   
        $this->loadModel('Userroles');
        $this->loadModel('PgDetails');
        $this->loadModel('Rooms');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $role= $this->Userroles->findById($user->role)->firstOrFail();
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'role' => $role,'users' => $users,'bookingrequest'=>$bookingrequest, 'pending' => $pending,'user' => $user));
    }
    public function adduser()
    {
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');       // return $this->redirect(['action'=>'pgowners'])
       $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user = $this->Users->newEntity($data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'pgowners']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Userroles->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'user_rolename'
        ]);
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $count=1;

        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs , 'pending'=>$pending,'rooms'=> $rooms, 'pgowners'=> $pgowners, 'transients'=>$transients ,'bookingrequest'=>$bookingrequest,'roles'=>$roles, 'users' => $users, 'user' => $user));
    }
    public function editpgowners($id=null)
    {   
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');       // return $this->redirect(['action'=>'pgowners']);

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'pgowners']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $count=1;

        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs , 'pending'=>$pending,'rooms'=> $rooms, 'pgowners'=> $pgowners, 'transients'=>$transients ,'bookingrequest'=>$bookingrequest, 'users' => $users, 'user' => $user));
    }
    public function edittransients($id=null)
    {   
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');       // return $this->redirect(['action'=>'pgowners']);
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'transients']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $count=1;
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $this->set(array('pgs'=> $pgs , 'pending'=>$pending,'rooms'=> $rooms, 'pgowners'=> $pgowners, 'transients'=>$transients , 'bookingrequest'=>$bookingrequest,'users' => $users, 'user' => $user));
    }
    public function changeupload($id=null)
    {   
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The upload has been saved.'));
                    return $this->redirect(['action' => 'pgowners',$id]);
            }
            $this->Flash->error(__('The upload could not be saved. Please, try again.'));
        }
        $this->set('user',$user);
    }
    public function block($id)
    {
        $user= $this->Users->get($id);
        $status=$user->status;
        $user->status=1-$status;
        if ($this->Users->save($user)) 
        {
            if($user->status==0)
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
        $this->Authentication->addUnauthenticatedActions(['login']);
    }
    public function profile()
    {
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $id=$this ->Users ->find()->where(['email'=>'vj603@gmail.com'])->select('user_id')->firstOrFail();

        $user = $this->Users->get($id['user_id'], [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $this->set(array('user' => $user));
    }
    public function login() 
    { 
        $this->request->allowMethod([ 'get','post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid() && $this->request->getData('email')=='vj603@gmail.com') 
        {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'pgowners'
            ]);
            return $this->redirect($redirect);

        }
        else
        
        if ($this->request->is('post') && !$result->isValid()) 
        {
            
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {   
        $result = $this->Authentication->getResult();
    if ($result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
    }

}


