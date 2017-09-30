<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Logfiles Model
 *
 * @method \App\Model\Entity\Logfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\Logfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Logfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Logfile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Logfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Logfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Logfile findOrCreate($search, callable $callback = null, $options = [])
 */
class LogfilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('logfiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('Log')
            ->requirePresence('Log', 'create')
            ->notEmpty('Log');

        return $validator;
    }
}
