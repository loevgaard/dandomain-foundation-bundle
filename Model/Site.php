<?php
namespace Loevgaard\DandomainFoundation\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Loevgaard\DandomainFoundation\Manager\SiteManager")
 * @ORM\Table(name="sites")
 */
class Site implements SiteInterface  {
    use SiteTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}