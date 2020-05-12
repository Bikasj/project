<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;

class RoomsController extends AppController
{
    
    public $paginate = [
        'maxLimit' => 4
    ];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    } 
    public function roomstatus()
    {
        $this->loadModel('Users');
        $this->loadModel('PgDetails');
        $room = $this->paginate($this->Rooms->find('all')); 
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $this->set(array('pgs'=> $pgs ,'pending'=>$pending,'users'=>$users ,'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'room' => $room ));
    }
    public function viewrooms($id=null)
    {
        $this->loadModel('Userroles');
        $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $room = $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $this->set(array('pgs'=> $pgs ,'pending'=> $pending ,'users'=> $users , 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients , 'room' => $room));
    }
    public function addroom()
    {
        $this->loadModel('PgDetails');
        $this->loadModel('Users');
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
             //echo $temp_name; 
        
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
                $this->Flash->success(__('The room has been added.'));
                    return $this->redirect(['action' => 'roomstatus','controller'=>'rooms']);
            }
            $this->Flash->error(__('The room could not be added. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
                ])->where(['status IN' => ['0','1']]);
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $count=1;
        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['1']])->count();
        $room = $this->Rooms->find()->count();
        $this->set(array('pgs'=> $pgs , 'pending'=>$pending, 'pgowners'=> $pgowners, 'transients'=>$transients , 'room' => $room,'pg_id' => $pg_id, 'users' => $users));
        $this->set(compact('rooms'));
    }
    public function editrooms($id=null)
    {   $this->loadModel('PgDetails');
        $this->loadModel('Users');
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $data=$this->request->getData();
            $data['updated']=date("Y-m-d h:i:s");
            $roomm = $this->Rooms->patchEntity($room, $data);
            if ($this->Rooms->save($roomm)) 
            {
                $this->Flash->success(__('The room has been saved.'));
                    return $this->redirect(['action' => 'roomstatus']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pg_id = $this->PgDetails->find('list', [ 
            'keyField' => 'pg_id',
            'valueField' => 'pg_id'
        ])->where(['status IN' => ['0','1']]);
        $users=$this ->Users ->find()->where(['email'=>'vj603@gmail.com']) ;
        $pending = $this->PgDetails->find()->where(['PgDetails.status' => '2'])->count();
        $pgowners = $this->Users->findByRole('1')->count();
        $transients = $this->Users->findByRole('2')->count();
        $count=1;

        $pgs = $this->PgDetails->find()->where(['PgDetails.status IN' => ['0','1']])->count();
        $rooms = $this->Rooms->find()->count();
        $this->set(array('pgs'=> $pgs ,'users'=>$users,'pending'=>$pending, 'rooms'=> $rooms , 'pgowners'=> $pgowners, 'transients'=>$transients ,'pg_id' => $pg_id, 'room' => $room));
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
                $this->Flash->success(__('The upload has been saved.'));
                    return $this->redirect(['action' => 'roomstatus']);
            }
            $this->Flash->error(__('The upload could not be saved. Please, try again.'));
        
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
                    $this->Flash->success(__('The room has been blocked.'));
                else
                    $this->Flash->success(__('The room has been unblocked.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
    }
}

