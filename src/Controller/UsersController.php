<?php

declare(strict_types=1);
namespace App\Controller;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\Mail;
use Cake\Mailer\EmailTransport;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

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
    public function forgotpassword()
    {
        if($this->request->is('post'))
        {
            $myemail=$this->request->getData('email');
            $mytoken=Security::hash(Security::randomBytes(25));
            $userTable=TableRegistry::get('Users');
            $user=$userTable->find('all')->where(['email'=>$myemail])->first();
            //$user->password='1234';
            $user->token=$mytoken;
            if($userTable->save($user))
            {   
                $mailer =new Mailer();
                $mailer=$mailer->setTransport('gmail')
                                    ->setEmailFormat('both')
                                    ->setfrom(['bikasjaiswal.zapbuild@gmail.com'=>'bikaskumar '])
                                    ->setSubject('Please confirm your reset password.')
                                    ->setTo($myemail);

                            $mailer->deliver('Hello '.$myemail.'<br>, Please click on the link below to reset your password<br><br><br><a href="http://localhost:8765/users/resetpassword/'.$mytoken.'">Reset Password</a>');
                            $this->Flash->success('Link has been sent to '.$myemail.' ');
            }
        }
    }
    public function resetpassword($token)
    {
        if($this->request->is('post'))
        {
            $mypass=$this->request->getData('password');
            $userTable=TableRegistry::get('Users');
            $user=$userTable->find('all')->where(['token'=>$token])->first();
            //$user['password']=$mypass;
            $user['password']=password_hash($mypass,PASSWORD_DEFAULT);
            if($userTable->save($user))
            {
                $this->Flash->success('Your have successfully changed your password! ');
                return $this->redirect(['action'=>'login']);
            }
        }
    }
    public function profile()
    {
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $user = $this->Users->get($this->Auth->user('user_id'), [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) 
            {echo "ss";
                $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'user' => $user));
    }
    public function transients()
    {
        $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $this->loadModel('Payments');

        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $room=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $room=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($room)->count();
        }
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $this->set(array('pgs'=> $pgs ,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count, 'rooms'=> $rooms , 'users'=>$users,'transient_users' => $transient_users));
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
        $room_id=$this->Payments->findByTransientuserId($id)->select('room_id')->firstOrFail(); 
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[$this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $role= $this->Userroles->findById($user->role)->firstOrFail();
        $room=0;$rooms=0;
        foreach ($lists as $list) 
        {
            $room=$list;
            $rooms=$rooms+ $this->Rooms->findByPgId($room)->count();
        }
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $this->set(array('pgs'=> $pgs ,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count, 'rooms'=> $rooms , 'users'=>$users,'transient_users' => $transient_users,'user'=>$user,'role'=>$role,'room_id'=>$room_id));
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
    public function register()
    {   
        $this->loadModel('Userroles');
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
            $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
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
    public function login() 
    { 
        if($this->request->is('post')){
            $myinfo = $this->Auth->identify();
            if($myinfo){
                $this->Auth->setUser($myinfo);
                
                if($myinfo['status'] == 0)
                {
                    $this->Flash->error("You have not access permission !");
                    return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }
                if($myinfo['role']==1)
                {
                    return $this->redirect(['controller'=>'PgDetails','action'=>'pg']);
                }
                else
                    if($myinfo['role']==2)
                {
                    return $this->redirect(['controller'=>'Rooms','action'=>'homepage']);
                }
                
            }else {
                $this->Flash->error("Incorrect username or password !");
            }
        }
    }
    public function logout()
    {   
        return $this->redirect($this->Auth->logout());
    }

}
