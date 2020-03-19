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
     
    $users = $this->paginate($this->Users,[
        'contain' => ['Userroles']]); 

    $this->set(compact('users'));
                                                                                                                 
    }   

    public function view($id = null)
    {   $this->loadModel('Userroles');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        
        $role= $this->Userroles->findById($user->role)->firstOrFail();
        
        $this->set('role', $role);
        $this->set('user', $user);
    }

    public function add()
    {    $this->loadModel('Userroles');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->getData());
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
         $this->set('roles', $roles);
         $this->set('user', $user);
         $this->set(compact('user'));
    }
    public function edit($id = null)
    {   $this->loadModel('Userroles');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
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
        $this->set('roles', $roles);
        $this->set(compact('user'));
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

public function login() { 
    $this->request->allowMethod([ 'get','post']);
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Users',
            'action' => 'index'
        ]);

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
    }
}

}
