<?php
namespace AdminLTETimeline\Controller;

use AdminLTETimeline\Controller\AppController;

/**
 * Timeline Controller
 *
 *
 * @method \AdminLTETimeline\Model\Entity\Timeline[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimelineController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Timeline id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $this->loadModel('AdminLTETimeline.Timeline');

        $timeline = $this->paginate($this->Timeline->find('all')->where([
            'OR' => [
                ['destination' => 'User', 'user_id' => $this->Auth->user('id')],
                ['destination' => 'Role', 'role_id' => $this->Auth->user('role')],
                ['destination' => 'Global']
            ]
        ])->limit(35)->orderDesc('id'));

        $this->set('timeline', $timeline);
    }
}
