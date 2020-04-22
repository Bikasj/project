<?php
    namespace App\Controller\Admin;

    use App\Controller\Admin\AppController;

    class UsersController extends AppController
{
    public $paginate = [
        'maxLimit' => 5
        
    ];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    // public function profile()
    // {
    //     $this->loadModel('Userroles');
    //     $this->loadModel('Rooms');
    //     $this->loadModel('PgDetails');
    //     $user = $this->Users->get($this->Auth->user('user_id'), [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['put','patch', 'post'])) 
    //     {
    //         $data=$this->request->getData();
    //         $data['updated']=date("Y-m-d h:i:s");
    //         $user = $this->Users->patchEntity($user, $data);
    //         if ($this->Users->save($user)) 
    //         {echo "ss";
    //             $this->Flash->success(__('The user has been saved.'));
    //                 return $this->redirect($this->referer());
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
    //     $rooms = $this->Rooms->find()->count();
    //     $pgowners = $this->Users->findByRole('1')->count();
    //     $transients = $this->Users->findByRole('2')->count();
    //     $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'user' => $user));
        
    // }
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
    public function register()
    {    $this->loadModel('Userroles');
         $this->loadModel('Rooms');
         $this->loadModel('PgDetails');
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
            $user = $this->Users->newEntity($data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success(__('The user has been added.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be added. Please, try again.'));
        }
         $roles = $this->Userroles->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'user_rolename'
        ]);
        $this->set(array('roles' => $roles, 'user' => $user));
    }
    public function index()
    {   
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $users = $this->paginate($this->Users); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $count=1;
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners,'count'=> $count,'transients'=>$transients , 'users' => $this -> paginate( $this ->Users ->findByRole('1'))));
    }  
    public function pgowners()
    {   
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $users = $this->paginate($this->Users); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $count=1;
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners,'count'=> $count,'transients'=>$transients , 'users' => $this -> paginate( $this ->Users ->findByRole('1'))));
    }   

    public function indexfortransients()
    {   
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $users = $this->paginate($this->Users); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'users' => $this -> paginate( $this ->Users ->findByRole('2'))));
    }   
    public function view($id = null)
    {   $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $role= $this->Userroles->findById($user->role)->firstOrFail();
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'role' => $role, 'user' => $user));
    }
    public function add()
    {    $this->loadModel('Userroles');
         $this->loadModel('Rooms');
         $this->loadModel('PgDetails');
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
             // $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user = $this->Users->newEntity($data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success(__('The user has been added.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be added. Please, try again.'));
        }
         $roles = $this->Userroles->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'user_rolename'
        ]);
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'roles' => $roles, 'user' => $user));
        
    }
    public function edit($id = null)
    {   $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'user' => $user));
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
                    return $this->redirect(['action' => 'index',$id]);
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

    public function login() 
    { 
        // if($this->request->is('post')){
        //     $myinfo = $this->Auth->identify();
        //     // debug($user);
        //     // exit;
        //     if($myinfo){
        //         $this->Auth->setUser($myinfo);
                
        //         if($myinfo['status'] == 0)
        //         {
        //             $this->Flash->error("You have not access permission !");
        //             return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        //         }
        //         if($myinfo['role']==1)
        //         {
        //             return $this->redirect(['controller'=>'PgDetails','action'=>'mypg']);
        //         }
        //         else
        //             if($myinfo['role']==2)
        //         {
        //             return $this->redirect(['controller'=>'Rooms','action'=>'homepage']);
        //         }
                
        //     }else {
        //         $this->Flash->error("Incorrect username or password !");
        //     }
        // }
        $this->request->allowMethod([ 'get','post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid() && $this->request->getData('email')=='vj603@gmail.com') 
        {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index'
            ]);
            // echo $this->request->getData('email');
            return $this->redirect($redirect);

        }
        else
        {
            $this->Flash->error(__('Sorry, you are not an admin!'));
        }
        if ($this->request->is('post') && !$result->isValid()) 
        {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {   
        $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
        // return $this->redirect($this->Auth->logout());
    }

}


