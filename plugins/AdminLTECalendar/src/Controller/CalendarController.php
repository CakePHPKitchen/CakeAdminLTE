<?php
namespace AdminLTECalendar\Controller;

use AdminLTECalendar\Controller\AppController;

/**
 * Calendar Controller
 *
 *
 * @method \AdminLTECalendar\Model\Entity\Calendar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CalendarController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $calendar = $this->paginate($this->Calendar);

        $this->set(compact('calendar'));
    }

    /**
     * View method
     *
     * @param string|null $id Calendar id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calendar = $this->Calendar->get($id, [
            'contain' => []
        ]);

        $this->set('calendar', $calendar);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calendar = $this->Calendar->newEntity();
        if ($this->request->is('post')) {
            $calendar = $this->Calendar->patchEntity($calendar, $this->request->getData());
            if ($this->Calendar->save($calendar)) {
                $this->Flash->success(__('The calendar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calendar could not be saved. Please, try again.'));
        }
        $this->set(compact('calendar'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Calendar id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calendar = $this->Calendar->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calendar = $this->Calendar->patchEntity($calendar, $this->request->getData());
            if ($this->Calendar->save($calendar)) {
                $this->Flash->success(__('The calendar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calendar could not be saved. Please, try again.'));
        }
        $this->set(compact('calendar'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Calendar id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calendar = $this->Calendar->get($id);
        if ($this->Calendar->delete($calendar)) {
            $this->Flash->success(__('The calendar has been deleted.'));
        } else {
            $this->Flash->error(__('The calendar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
