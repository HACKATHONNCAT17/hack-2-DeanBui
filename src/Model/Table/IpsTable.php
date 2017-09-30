<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ips Model
 *
 * @method \App\Model\Entity\Ip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ip findOrCreate($search, callable $callback = null, $options = [])
 */
class IpsTable extends Table
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

        $this->setTable('ips');
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
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->integer('lv')
            ->requirePresence('lv', 'create')
            ->notEmpty('lv');

        return $validator;
    }
}
