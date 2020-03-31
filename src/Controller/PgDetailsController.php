<?php

declare(strict_types=1);
namespace App\Controller;

class PgDetailsController extends AppController
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
    $this->loadModel('Rooms');

    $pg_details = $this->paginate($this->PgDetails,[
        'contain' => ['Users']]); 
    $pgs = $this->PgDetails->find()->count();
    $rooms = $this->Rooms->find()->count();
    $pgowners = $this->Users->findByRole('1')->count();
    $transients = $this->Users->findByRole('2')->count();
    $users= $this->Users->findByRole('1');
    $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients  ));
    $this->set(compact('pg_details'));
     
    }   

    public function view($id = null)
    {   $this->loadModel('Users');
        $this->loadModel('Rooms');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => ['Users']
        ]);
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $totalusers = $this->Users->find()->count();
        //$this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'totalusers'=> $totalusers ));
        
        $room = $this->paginate($this->Rooms); 
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'room' => $this -> paginate( $this ->Rooms->findByPgId($id) )));
        $this->set(compact('pg_details'));

    }

    public function add()
    {    $this->loadModel('Rooms');
         $this->loadModel('Users');
        $pg_details = $this->PgDetails->newEmptyEntity();
        if ($this->request->is('post')) {
        //     $imgdata = $this->request->getData('image');
        //     $tmpName = $imgdata->getStream()->getMetadata('uri');
        //     $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            // $data['image']=$img;
            $pg_details = $this->PgDetails->newEntity($data);
            if ($this->PgDetails->save($pg_details)) { 
                $this->Flash->success(__('The PG has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The PG could not be saved. Please, try again.'));
        }
         $owner_id = $this->Users->find('list', [ 
            'keyField' => 'user_id',
            'valueField' => 'firstname'
        ]);
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'owner_id' => $owner_id,'pg_details' => $pg_details));
    }
    public function edit($id = null)
    {   $this->loadModel('Users');
        $this->loadModel('Rooms');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['put','patch', 'post'])) {
            // $imgdata = $this->request->getData('image');
            // $tmpName = $imgdata->getStream()->getMetadata('uri');
            // $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            // $data['image']=$img;
            $pg_details = $this->PgDetails->patchEntity($pg_details, $data);
            if ($this->PgDetails->save($pg_details)) {
                $this->Flash->success(__('The user has been modified.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be modified. Please, try again.'));
        }
         $owner_id = $this->Users->find('list', [ 
            'keyField' => 'user_id',
            'valueField' => 'firstname'
        ]);
        $pgs = $this->PgDetails->find()->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'owner_id' => $owner_id,'pg_details'=>$pg_details));
        
    }
    public function block($id)
    {
            $pg_details= $this->PgDetails->get($id);
            $status=$pg_details->status;
            $pg_details->status=1-$status;
            if ($this->PgDetails->save($pg_details)) {
                if($pg_details->status==0)
                    $this->Flash->success(__('The PG has been blocked.'));
                else
                    $this->Flash->success(__('The PG has been unblocked.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The PG could not be saved. Please, try again.'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $this->Authentication->addUnauthenticatedActions(['login', 'add']);
}

    public function pgrequest()
    {
    $this->loadModel('Users');
    $this->loadModel('Rooms');
    
    $pg_details = $this->paginate($this->PgDetails->findByStatus('0'),[
        'contain' => ['Users']]); 
    $pgs = $this->PgDetails->find()->count();
    $rooms = $this->Rooms->find()->count();
    $pgowners = $this->Users->findByRole('1')->count();
    $transients = $this->Users->findByRole('2')->count();
    $users= $this->Users->findByRole('1');
    $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'pg_details' => $this -> paginate( $this ->PgDetails->findByStatus('0') )));
        $this->set(compact('pg_details'));
     
    } 

}
