<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Logs Controller
 *
 * @property \App\Model\Table\LogsTable $Logs
 *
 * @method \App\Model\Entity\Log[] paginate($object = null, array $settings = [])
 */
class LogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $logs = $this->paginate($this->Logs);

        $this->set(compact('logs'));
        $this->set('_serialize', ['logs']);
    }

    /**
     * View method
     *
     * @param string|null $id Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $log = $this->Logs->get($id, [
            'contain' => []
        ]);

        $this->set('log', $log);
        $this->set('_serialize', ['log']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $log = $this->Logs->newEntity();
        if ($this->request->is('post')) {
            $log = $this->Logs->patchEntity($log, $this->request->getData());
            if ($this->Logs->save($log)) {
                $this->Flash->success(__('The log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The log could not be saved. Please, try again.'));
        }
        $this->set(compact('log'));
        $this->set('_serialize', ['log']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $log = $this->Logs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $log = $this->Logs->patchEntity($log, $this->request->getData());
            if ($this->Logs->save($log)) {
                $this->Flash->success(__('The log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The log could not be saved. Please, try again.'));
        }
        $this->set(compact('log'));
        $this->set('_serialize', ['log']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $log = $this->Logs->get($id);
        if ($this->Logs->delete($log)) {
            $this->Flash->success(__('The log has been deleted.'));
        } else {
            $this->Flash->error(__('The log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function check($id = null){
        
        //select the logs
         $logfile = $this->Logs->get($id, [
            'contain' => []
        ]);
         
         //select text from log
        $logText = $logfile->log_text;
        //Connect to Ips tables
        $ipTable= TableRegistry::get('ips');
        //pull entry from ips table
        $data =$ipTable->find('all');
        
        $check =0;
        
        //loop through ips table and find badIP in log
        //display warning if needed
        foreach($data as $entry){
         $result = strpos($logText, $entry->text);
         if($result == False){
             
         }
         else{
             $check =1;
             $this->Flash->error('This IP'.$entry->text.' is trying to make harmfull work to your computer becarefull');
             
         }
         
         
    }
        if( $check ==0){
                 $this->Flash->set('All clear');
             }
    }
    
    public function login(){
         if ($this->request->is('post')) {
             return $this->redirect(['action' => 'index']);
         }
    }
}
