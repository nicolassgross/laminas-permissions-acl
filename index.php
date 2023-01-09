<?php 
include_once "vendor/autoload.php";

use Laminas\Permissions\Acl\Acl;
use Laminas\Permissions\Acl\Role\GenericRole as Role;
use Laminas\Permissions\Acl\Resource\GenericResource as Resource;

$objAcl = new Acl();

//cria roles de acesso
$objAcl->addRole(new Role('convidado'))
    ->addRole(new Role('usuario'))
    ->addRole(new Role('admin'));

//cria usuario com permissao de admin
$objAcl->addRole(new Role('Nicolas'), 'admin');

//conteudo a ser acessado
$objAcl->addResource(new Resource('noticias'));

//define permissão de accesso para cada role criada
$objAcl->deny('convidado', 'noticias');
$objAcl->allow('usuario', 'noticias');
$objAcl->allow('admin', 'noticias');

//verifica se o usuario criado anteriormente possui acesso ao conteudo citado
echo $objAcl->isAllowed('Nicolas', 'noticias') ? 'Possui permissão' : 'Permissão negada';
