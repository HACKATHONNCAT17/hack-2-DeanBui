<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Logfiles Controller
 *
 * @property \App\Model\Table\LogfilesTable $Logfiles
 *
 * @method \App\Model\Entity\Logfile[] paginate($object = null, array $settings = [])
 */
class LogfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $logfiles = $this->paginate($this->Logfiles);

        $this->set(compact('logfiles'));
        $this->set('_serialize', ['logfiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Logfile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logfile = $this->Logfiles->get($id, [
            'contain' => []
        ]);

        $this->set('logfile', $logfile);
        $this->set('_serialize', ['logfile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logfile = $this->Logfiles->newEntity();
        if ($this->request->is('post')) {
            $logfile = $this->Logfiles->patchEntity($logfile, $this->request->getData());
            if ($this->Logfiles->save($logfile)) {
                $this->Flash->success(__('The logfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logfile could not be saved. Please, try again.'));
        }
        $this->set(compact('logfile'));
        $this->set('_serialize', ['logfile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Logfile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logfile = $this->Logfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logfile = $this->Logfiles->patchEntity($logfile, $this->request->getData());
            if ($this->Logfiles->save($logfile)) {
                $this->Flash->success(__('The logfile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logfile could not be saved. Please, try again.'));
        }
        $this->set(compact('logfile'));
        $this->set('_serialize', ['logfile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Logfile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logfile = $this->Logfiles->get($id);
        if ($this->Logfiles->delete($logfile)) {
            $this->Flash->success(__('The logfile has been deleted.'));
        } else {
            $this->Flash->error(__('The logfile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
