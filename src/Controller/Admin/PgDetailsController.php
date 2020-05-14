<?php

declare(strict_types=1);
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;

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
    public function allpgs()
    {   
        $this->loadModel('Users');
        $this->loadModel('Rooms');
        $pg_detail=$this->PgDetails->find('all')->where(['PgDetails.status IN' => ['0','1']]);
        $pg = $this->paginate($pg_detail,[
            'contain' => ['Users']]); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByEmail('vj603@gmail.com');
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs ,'users'=>$users, 'bookingrequest'=>$bookingrequest,'rooms'=> $rooms ,'pending'=>$pending, 'pgowners'=> $pgowners, 'transients'=>$transients ,'pg'=>$pg ));
    }   
    public function viewpg($id=null)
    {   $this->loadModel('Users');
        $this->loadModel('Rooms');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => ['Users']
        ]);
        $room = $this->Rooms->findByPgId($id)->all(); 
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByEmail('vj603@gmail.com');
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs ,'room'=>$room,'users'=>$users,'pending'=>$pending, 'rooms'=> $rooms ,'bookingrequest'=>$bookingrequest, 'pgowners'=> $pgowners, 'transients'=>$transients ));
        $this->set(compact('pg_details'));
    }
    public function addpg()
    {
        $this->loadModel('Rooms');
        $this->loadModel('Users');
        $pg_details = $this->PgDetails->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $data=$this->request->getData();
            $data['status']=1;
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");
            $pg_details = $this->PgDetails->newEntity($data);
            if ($this->PgDetails->save($pg_details)) 
            { 
                $this->Flash->success(__('The PG has been saved.'));
                    return $this->redirect(['action' => 'allpgs']);
            }
            $this->Flash->error(__('The PG could not be saved. Please, try again.'));
        }
         $owner_id = $this->Users->findByRole('1')->find('list', [ 
            'keyField' => 'user_id',
            'valueField' => 'firstname'
        ]);
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $count=1;
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs , 'pending'=>$pending,'rooms'=> $rooms, 'pgowners'=> $pgowners,'bookingrequest'=>$bookingrequest, 'owner_id' => $owner_id,'transients'=>$transients , 'users' => $users,'pg_details'=>$pg_details));
    }
    public function editpg($id=null)
    {
        $this->loadModel('Users');
        $this->loadModel('Rooms');
        $pg_details = $this->PgDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['put','patch', 'post'])) {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $pg_details = $this->PgDetails->patchEntity($pg_details, $data);
            if ($this->PgDetails->save($pg_details)) {
                $this->Flash->success(__('The user has been modified.'));
                    return $this->redirect(['action' => 'allpgs']);
            }
            $this->Flash->error(__('The user could not be modified. Please, try again.'));
        }
         $owner_id = $this->Users->find('list', [ 
            'keyField' => 'user_id',
            'valueField' => 'firstname'
        ]);
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $count=1;

        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs , 'pending'=>$pending,'rooms'=> $rooms, 'pgowners'=> $pgowners,'bookingrequest'=>$bookingrequest, 'owner_id' => $owner_id,'transients'=>$transients , 'users' => $users,'pg_details'=>$pg_details));
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
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('The PG could not be blocked. Please, try again.'));
    }
    public function approve($id)
    {   
        $pg_details= $this->PgDetails->get($id);
        $pg_details->status=1;
        if ($this->PgDetails->save($pg_details)) {
            if($pg_details->status==1)
                $this->Flash->success(__('The PG has been approved.'));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('The PG could not be approved. Please, try again.'));
    }
    public function pending()
    {
        $this->loadModel('Users');
        $this->loadModel('Rooms');
        $pg = $this->paginate($this->PgDetails->findByStatus('2'),[
            'contain' => ['Users']]); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByEmail('vj603@gmail.com');
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count(); 
        $this->set(array('pgs'=> $pgs ,'users'=>$users, 'rooms'=> $rooms ,'pending'=>$pending, 'pgowners'=> $pgowners,'bookingrequest'=>$bookingrequest, 'transients'=>$transients ,'pg'=>$pg ));
    } 
    
}
