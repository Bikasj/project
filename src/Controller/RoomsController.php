<?php
declare(strict_types=1);
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\Mail;
use Cake\Mailer\EmailTransport;
use Cake\ORM\Query;

class RoomsController extends AppController
{
    public $paginate = [
        'maxLimit' => 6
    ];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function homepageresults2()
    {   $this->loadModel('PgDetails');
        $this->request->allowMethod('ajax');
        $seater = $this->request->getQueryParams('seater');
        $gridd = $this->request->getQueryParams('grid');
        $grid =$gridd['grid'];
        $gender = $this->request->getQueryParams('gender');
        if($gender['gender']=="all"){
        $room=$this->paginate($this->Rooms->find('all',[
              'conditions' => [ 'Rooms.status'=>'1','seater'=>$seater['seater']],
              'limit' => 10])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        }
        else
        {
            $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'seater'=>$seater['seater'],
                                                    'Rooms.pg_id IN' => [$this->PgDetails->find('list',[
                                                        'conditions' => 
                                                        ['gender'=>$gender['gender'],
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                        ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        }   
        $this->set('room',$room);
        $this->set('grid',$grid);
    }
    public function homepageresults3()
    {   $this->loadModel('PgDetails');
        $this->request->allowMethod('ajax');
        $area = $this->request->getQueryParams('area');
        $gender = $this->request->getQueryParams('gender');
        $gridd = $this->request->getQueryParams('grid');
        $grid =$gridd['grid'];
        if($gender['gender']=="all"){
        $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'area' => $area['area'] ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                       ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        }
        else
        {
            $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'gender'=>$gender['gender'],
                                                        'area' => $area['area'] ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        }
        $this->set('room',$room);
        $this->set('grid',$grid);
    }
    public function homepageresults4()
    {   
        $this->loadModel('PgDetails');
        $this->request->allowMethod('ajax');
        $area = $this->request->getQueryParams('area');
        $seater = $this->request->getQueryParams('seater');
        $gender = $this->request->getQueryParams('gender');
        $gridd = $this->request->getQueryParams('grid');
        $grid =$gridd['grid'];
        if($gender['gender']=="all"){
        $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'seater'=>$seater['seater'],
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'area' => $area['area'] ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        }
        else if($gender['seater']=="none" && $area['area']=="none"){
        $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'gender' => $gender['gender'] ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        }
        else
        {
            $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'seater'=>$seater['seater'],
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'gender'=>$gender['gender'],
                                                        'area' => $area['area'] ,
                                                        'PgDetails.status'=>'1'
                                                    ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        }
        $this->set('room',$room);
        $this->set('grid',$grid);
    }
    public function viewroom($id)
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $roomregistry = TableRegistry::get('Rooms');
        $pgid = $roomregistry->get($id)->pg_id;//to find pgid
        $pgdetails=$this->PgDetails->get($pgid, [
            'contain' => [],
        ]);
        $pgowner=$this->Users->find('all')->where(['user_id' =>$pgdetails['owner_id']]); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowner'=> $pgowner, 'pgdetails'=>$pgdetails , 'room' => $room));
    }
    public function homepage()
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        $pgowner=$this->Users->find('all')->where(['role' =>1]); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowner'=> $pgowner ,'room' => $room));
    }
    public function homepageresults()
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        if ($this->request->is('get')) 
        { 
            if($this->request->getQueryParams()!=null)
            {
            $data=$this->request->getQueryParams();
                if($data['location']==null)
                    $this->Flash->error("Please enter the location to search!");
                elseif($data['area']==null)
                    $this->Flash->error("Please enter the area to search!");
            $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' =>[
                                                        'location' => $data['location'] ,
                                                        'area' => $data['area'] ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                       ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
            }
        }
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'room'=>$room ));
    }
    public function homepageresultsnav1($area)
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'area' => $area ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        $this->set(array('room'=>$room ));
    }
    public function homepageresultsnav2($gender)
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'gender' => $gender ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        $this->set(array('room'=>$room ));
    }
    public function homepagegrid()
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                        ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms ,  'room' => $room));
    }
    public function homegridresults()
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        if ($this->request->is('get')) 
        {
            if($this->request->getQueryParams()!=null)
            {
            $data=$this->request->getQueryParams();
                if($data['location']==null)
                    $this->Flash->error("Please enter the location to search!");
                elseif($data['area']==null)
                    $this->Flash->error("Please enter the area to search!");
            $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.status'=>'1',
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'location' => $data['location'] ,
                                                        'area' => $data['area'] ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
            }
        }
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'room'=>$room ));
    }
    public function guest()
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room=$this->Rooms->find('all',[
                                        'conditions' => [
                                        'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                        'conditions' => [
                                        'PgDetails.status'=>'1'
                                                    ]])],
                                                        ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']);
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>
            $transients ,'room' => $room));
    }
    public function viewguest()
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        if ($this->request->is('get')) 
        {
            if($this->request->getQueryParams()!=null)
            {
            $data=$this->request->getQueryParams();
            $room=$this->paginate($this->Rooms->find('all',[
                                                    'conditions' => [
                                                    'Rooms.pg_id IN' => [ $this->PgDetails->find('list',[
                                                        'conditions' => [
                                                        'location' => $data['location'] ,
                                                        'area' => $data['area'] ,
                                                        'PgDetails.status'=>'1'
                                                        ]])],
                                                                    ]
                                                            ])
            ->select(['room_id','seater','ac_facility','rent','image','food_availability','security_charge','notice_period','seats_available','status'])
            ->select($this->Rooms->PgDetails)
            ->contain(['PgDetails']));
            }
        }
        $pgdetails=$this->PgDetails->find()->all();
        $pgdetail = array();
        foreach($pgdetails as $anything) {
        $pgdetail[] = $anything;
        }
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $users= $this->Users->findByRole('1');
        $this->set(array('pgs'=> $pgs ,'pgdetail'=>$pgdetail ,'room'=> $room , 'pgowners'=> $pgowners, 'transients'=>$transients , ));
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
    public function changeupload2($id=null)
    {
        $rooms = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $flag=0;

            $arr=[];
    if (($_FILES['images']['name']!=""))
            {
            global $count;
            
            $count=count($_FILES['images']['name']);
            
            $target_dir = "/images/rooms/";
             
        for($i = 0;$i < $count;$i++)
        {
             $temp=strtotime("now");
             $file = $_FILES['images']['name'][$i];
             $path = pathinfo($file);
             $filename = $path['filename'];
             $ext = $path['extension'];
             $temp_name = $_FILES['images']['tmp_name'][$i];
             $img_name=$filename.$temp.".".$ext;
             $path_filename_ext = WWW_ROOT . 'images'.DS . 'rooms' .DS  .$img_name;
            if (file_exists($path_filename_ext)) 
                {
                    $flag=1;
                    break;
                 }
             else
                 {
                     
                 move_uploaded_file($temp_name,$path_filename_ext);
                 
                 }
                $arr[]=$img_name;
        }
                if($flag!=0)
                {
                    echo "Sorry, file already exists.";
                }
            }   

            $img_name=implode(",",$arr);
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $data['images']=$img_name;
            $rooms = $this->Rooms->patchEntity($rooms, $data);
            if ($this->Rooms->save($rooms)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'roomstatus']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        
        }
        $this->set(compact('rooms'));
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
    
    public function addbypg()
    {   $this->loadModel('PgDetails');
        $rooms = $this->Rooms->newEmptyEntity();
        if ($this->request->is('post')) 
       {  
        $flag=0;

            $arr=[];
    if (($_FILES['images']['name']!=""))
            {
            global $count;
            
            $count=count($_FILES['images']['name']);
            
            $target_dir = "/images/rooms/";
             
        for($i = 0;$i < $count;$i++)
        {

            $temp=strtotime("now");
            $file = $_FILES['images']['name'][$i];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['images']['tmp_name'][$i];
            $img_name=$filename.$temp.".".$ext;
            $path_filename_ext = WWW_ROOT . 'images'.DS . 'rooms' .DS  .$img_name;
            if (file_exists($path_filename_ext)) 
                {
                    $flag=1;
                    break;
                 }
             else
                 {
                     
                 move_uploaded_file($temp_name,$path_filename_ext);
                 
                 }
                $arr[]=$img_name;
        }
                if($flag!=0)
                {
                    echo "Sorry, file already exists.";
                }
            }   
            $img_name=implode(",",$arr);
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");
            $data['images']=$img_name;
            $rooms = $this->Rooms->newEntity($data);
            if ($this->Rooms->save($rooms)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'mypg','controller'=>'PgDetails']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
                ])->where(['owner_id' => $this->Auth->user('user_id'),'status IN' => ['0','1']]);
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs , 'room'=> $room,'pg_id'=> $pg_id ,'rooms'=>$rooms));
        $this->set(compact('rooms'));
    }
    public function add()
    {   
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $this->loadModel('Payments');
        $rooms = $this->Rooms->newEmptyEntity();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        if ($this->request->is('post')) 
       {  
        $flag=0;

            $arr=[];
    if (($_FILES['images']['name']!=""))
            {
            global $count;
            
            $count=count($_FILES['images']['name']);
            
            $target_dir = "/images/rooms/";
             
        for($i = 0;$i < $count;$i++)
        {
            $temp=strtotime("now");
            $file = $_FILES['images']['name'][$i];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['images']['tmp_name'][$i];
            $img_name=$filename.$temp.".".$ext;
            $path_filename_ext = WWW_ROOT . 'images'.DS . 'rooms' .DS  .$img_name;
            if (file_exists($path_filename_ext)) 
                {
                    $flag=1;
                    break;
                }
             else
                {     
                 move_uploaded_file($temp_name,$path_filename_ext);
                 
                }
                $arr[]=$img_name;
        }
                if($flag!=0)
                {
                    echo "Sorry, file already exists.";
                }
            }   
            $img_name=implode(",",$arr);
            $imgdata = $this->request->getData('image');
            $tmpName = $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tmpName);
            $data=$this->request->getData();
            $data['image']=$img;
            $data['created']=date("Y-m-d h:i:s");
            $data['updated']=date("Y-m-d h:i:s");
            $data['images']=$img_name;
            $rooms = $this->Rooms->newEntity($data);
            if ($this->Rooms->save($rooms)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'roomstatus','controller'=>'rooms']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
                ])->where(['owner_id' => $this->Auth->user('user_id'),'status IN' => ['1']]);
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $this->set(array('pgs'=> $pgs,'transient_count'=>$transient_count,'bookingrequest'=>$bookingrequest ,'users'=>$users, 'room'=> $room,'pg_id'=> $pg_id ));
        $this->set(compact('rooms'));
    }
    public function roomstatus()
    {   
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $this->loadModel('Payments');
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();

        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$room=0;$j=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }        
        $rooms =$this->paginate($this->Rooms->find('all', [
                                                    'conditions' => [
                                                    'pg_id IN' => [ $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]) ] 
                                                                    ]
                                                            ]
                                                    )
                                );
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $this->set(array('pgs'=> $pgs,'transient_count'=>$transient_count,'bookingrequest'=>$bookingrequest ,'users'=>$users, 'room'=> $room ,'rooms'=>$rooms));
        $this->set(compact('rooms'));   
    }
    public function edit($id=null)
    {   
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $this->loadModel('Payments');
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
                    return $this->redirect(['action' => 'roomstatus']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
                ])->where(['owner_id' => $this->Auth->user('user_id')],['status IN' => ['0','1']]);
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $this->set(array('pgs'=> $pgs,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count ,'users'=>$users, 'room'=> $room,'pg_id'=> $pg_id ,'rooms'=>$rooms));
        $this->set(compact('rooms'));

    }
    public function view($id=null)
    {   $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $this->loadModel('Payments');
        $rooms = $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $this->set(array('pgs'=> $pgs ,'users'=>$users, 'room'=> $room,'rooms'=>$rooms,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count));
        $this->set(array('room' => $room));
    }
    public function viewbookingrequest($id=null)
    {   $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $this->loadModel('Payments');
        $rooms = $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $transient_id=$rooms->booking_request_by;
        $transient= $this->Users->get($transient_id, [
            'contain' => [],
        ]);
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $roomm=0;$room=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $this->set(array('pgs'=> $pgs,'transient'=>$transient ,'users'=>$users, 'room'=> $room,'rooms'=>$rooms,'bookingrequest'=>$bookingrequest,'transient_count'=>$transient_count));
        $this->set(array('room' => $room));
    }

    public function book($id=null)
    {  
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $roomregistry = TableRegistry::get('Rooms');
        $pgid = $roomregistry->get($id)->pg_id;//to find pgid
        $pgdetails=$this->PgDetails->get($pgid, [
            'contain' => [],
        ]);
        $pgowner=$this->Users->find('all')->where(['user_id' =>$pgdetails['owner_id']]); 
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs , 'rooms'=> $rooms , 'pgowner'=> $pgowner, 'pgdetails'=>$pgdetails , 'room' => $room));
    }
    public function bookingconfirmation($id=null)
    {
        $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $roomregistry = TableRegistry::get('Rooms');
        $room=$this->Rooms->findByRoomId($id)->first();
        $pgid = $roomregistry->get($id)->pg_id;//to find pgid
        $pgdetails=$this->PgDetails->get($pgid, [
            'contain' => [],
        ]);
        $pgowner=$this->Users->find()->where(['user_id' =>$pgdetails['owner_id']])->first();
        $owner_email=$pgowner['email']; 
        $admin_email="";
        $room->booking_request_by=$this->Auth->user('user_id');
            if($roomregistry->save($room))
            {   
        $mailer =new Mailer();
                $mailer=$mailer->setTransport('gmail')
                                    ->setEmailFormat('both')
                                    ->setfrom(['bikasjaiswal.zapbuild@gmail.com'=>'bikaskumar '])
                                    ->setSubject('Please confirm your room book request ASAP.')
                                    ->setTo($owner_email)
                                    ->setCc("bikasjaiswal.zapbuild@gmail.com");

                            $mailer->deliver('Hello Owner,<br>, Please click on the link below to confirm the request.<br><br><br><a href="localhost:8765/rooms/bookingrequest">View requests</a> <br>');
            }
    }
    public function bookingrequest()
    {
        $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $this->loadModel('Payments');
        $pgs = $this->PgDetails->findByOwnerId($this->Auth->user('user_id'))->where(['PgDetails.status IN' => ['0','1']])->count();
        $users=$this->Users->findByUserId($this->Auth->user('user_id'))->firstOrFail();

        $lists = $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')]);
        $bookingrequest=$this->Rooms->find()->where(['booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ]])->count();
        $roomm=0;$room=0;$j=0;
        foreach ($lists as $list) 
        {
            $roomm=$list;
            $room=$room+ $this->Rooms->findByPgId($roomm)->count();
        }        
        $rooms =$this->paginate($this->Rooms->find('all', [
                                                    'conditions' => [
                                                    'booking_request_by IN'=>[ $this->Users->find()->where(['role' => 2])->select('user_id') ],
                                                    'pg_id IN' => [ $this->PgDetails->find('list')->where(['owner_id' => $this->Auth->user('user_id')])] 
                                                                    ]
                                                            ]
                                                    )
                                );
        $transient_id=$this->Payments->find()->where(['pgowner_id'=>$this->Auth->user('user_id')])->select('transientuser_id');
        $transient_users= $this -> paginate( $this->Users->find()->where(['user_id IN'=>$transient_id]));
        $transient_count=count($transient_users);
        $this->set(array('pgs'=> $pgs,'transient_count'=>$transient_count,'bookingrequest'=>$bookingrequest ,'users'=>$users, 'room'=> $room ,'rooms'=>$rooms));
        $this->set(compact('rooms'));  

    }
    public function approve($id)
    {   $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $room= $this->Rooms->get($id);
        $pgid= $this->Rooms->get($id)->pg_id;
        $owner_id=$this->PgDetails->get($pgid)->owner_id;
        $transient_id=$room->booking_request_by;
        $email=$this->Users->findByUserId($transient_id)->select('email');
        $rent=$room->rent;
        $room_id=$room->room_id;
        $room->booking_request_by=NULL;
        $room->seats_available=$room->seats_available-1;
        if ($this->Rooms->save($room)) {
            $mailer =new Mailer();
            $mailer=$mailer->setTransport('gmail')
                                    ->setEmailFormat('both')
                                    ->setfrom(['bikasjaiswal.zapbuild@gmail.com'=>'bikaskumar '])
                                    ->setSubject('Congratulations, Your request has been approved.')
                                    ->setTo("vj660033@gmail.com")
                                    ->setCc("bikasjaiswal.zapbuild@gmail.com");

                            $mailer->deliver('Hello Transient Guest,<br>, Your request for PG booking has been approved.Feel like your own PG! :) </a> <br>');

            return $this->redirect(['action'=>'payment','controller'=>'Payments',$transient_id,$owner_id,$rent,$room_id]);
        }
        $this->Flash->error(__('The PG request could not be approved. Please, try again.'));
    }
    public function decline($id)
    {   
        $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $room= $this->Rooms->get($id);
        $transient_id=$room->booking_request_by;
        $email=$this->Users->findByUserId($transient_id)->select('email');
        $room->booking_request_by=NULL;
        if ($this->Rooms->save($room)) {
            $mailer =new Mailer();
            $mailer=$mailer->setTransport('gmail')
                                    ->setEmailFormat('both')
                                    ->setfrom(['bikasjaiswal.zapbuild@gmail.com'=>'bikaskumar '])
                                    ->setSubject('Sorry, Your request has not been approved.')
                                    ->setTo("vj660033@gmail.com")
                                    ->setCc("bikasjaiswal.zapbuild@gmail.com");
                            $mailer->deliver('Hello Transient Guest,<br>, Your request for PG booking has not been approved.Kindly contact the owner for further assistance! :( </a> <br>');

        $this->Flash->success(__('The PG request has successfully been declined!'));
            return $this->redirect(['action'=>'bookingrequest']);
        }
        $this->Flash->error(__('The PG request could not be declined. Please, try again.'));
    }
}

