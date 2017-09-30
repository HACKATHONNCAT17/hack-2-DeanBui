<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ips Controller
 *
 * @property \App\Model\Table\IpsTable $Ips
 *
 * @method \App\Model\Entity\Ip[] paginate($object = null, array $settings = [])
 */
class IpsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ips = $this->paginate($this->Ips);

        $this->set(compact('ips'));
        $this->set('_serialize', ['ips']);
    }

    /**
     * View method
     *
     * @param string|null $id Ip id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ip = $this->Ips->get($id, [
            'contain' => []
        ]);

        $this->set('ip', $ip);
        $this->set('_serialize', ['ip']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ip = $this->Ips->newEntity();
        if ($this->request->is('post')) {
            $ip = $this->Ips->patchEntity($ip, $this->request->getData());
            if ($this->Ips->save($ip)) {
                $this->Flash->success(__('The ip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ip could not be saved. Please, try again.'));
        }
        $this->set(compact('ip'));
        $this->set('_serialize', ['ip']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ip = $this->Ips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ip = $this->Ips->patchEntity($ip, $this->request->getData());
            if ($this->Ips->save($ip)) {
                $this->Flash->success(__('The ip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ip could not be saved. Please, try again.'));
        }
        $this->set(compact('ip'));
        $this->set('_serialize', ['ip']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ip = $this->Ips->get($id);
        if ($this->Ips->delete($ip)) {
            $this->Flash->success(__('The ip has been deleted.'));
        } else {
            $this->Flash->error(__('The ip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
