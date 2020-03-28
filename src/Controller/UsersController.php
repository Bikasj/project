<?php

declare(strict_types=1);
namespace App\Controller;

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
    public function index()
    {   
    $this->loadModel('Userroles');
    $this->loadModel('Rooms');
    $this->loadModel('PgDetails');
    $users = $this->paginate($this->Users/*,[
        'contain' => ['Userroles']]*/); 
    $pgs = $this->PgDetails->find()->count();
    $rooms = $this->Rooms->find()->count();
    $totalusers = $this->Users->find()->count();
    $users= $this->Users->findByRole('1');
    $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers , 'users' => $this -> paginate( $this ->Users ->findByRole('1'))));
    }   
     public function indexfortransients()
    {   
    $this->loadModel('Userroles');
    $this->loadModel('Rooms');
    $this->loadModel('PgDetails');
    $users = $this->paginate($this->Users/*,[
        'contain' => ['Userroles']]*/); 
    $pgs = $this->PgDetails->find()->count();
    $rooms = $this->Rooms->find()->count();
    $totalusers = $this->Users->find()->count();
    $users= $this->Users->findByRole('1');
    $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers , 'users' => $this -> paginate( $this ->Users ->findByRole('2'))));
    }   

    public function view($id = null)
    {   $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $role= $this->Userroles->findById($user->role)->firstOrFail();
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $totalusers = $this->Users->find()->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers ,'role' => $role, 'user' => $user));
    }

    public function add()
    {    $this->loadModel('Userroles');
         $this->loadModel('Rooms');
         $this->loadModel('PgDetails');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
             // $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
            $user = $this->Users->newEntity($data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
         $roles = $this->Userroles->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'user_rolename'
        ]);
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $totalusers = $this->Users->find()->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers ,'roles' => $roles, 'user' => $user));
    }
    public function edit($id = null)
    {   $this->loadModel('Userroles');
        $this->loadModel('Rooms');
        $this->loadModel('PgDetails');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['put','patch', 'post'])) {
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been modified.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be modified. Please, try again.'));
        }
        $roles = $this->Userroles->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'user_rolename'
        ]);
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $totalusers = $this->Users->find()->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers ,'roles' => $roles, 'user' => $user));
        
    }
    public function block($id)
    {
            $user= $this->Users->get($id);
            $status=$user->status;
            $user->status=1-$status;
            if ($this->Users->save($user)) {
                if($user->status==0)
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

public function login() 
{ 
    
    $this->request->allowMethod([ 'get','post']);
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
       
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Users',
            'action' => 'index'
        ]);
         $GLOBALS['val'] = 0;
        return $this->redirect($redirect);
    }
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}
public function logout()
{   
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
        
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        $GLOBALS['val'] = 1;
    }
}
public function contactus()
{

}

}
