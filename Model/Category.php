<?php

namespace Loevgaard\DandomainFoundationBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Category implements CategoryInterface
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $b2bGroupId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     */
    protected $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $customInfoLayout;

    /**
     * @var int
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $externalId;



    /**
     * @var bool
     *
     * @ORM\Column(name="hidden", type="boolean")
     */
    protected $hidden;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", nullable=true, type="string")
     */
    protected $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", nullable=true, type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", nullable=true, type="string")
     */
    protected $url;

/*
  public $customListLayout =>
  int(0)
  public $defaultParentId =>
  NULL
  public $editedDate =>
  string(26) "/Date(1476949782000+0200)/"
  public $infoLayout =>
  int(0)
  public $internalId =>
  int(3)
  public $listLayout =>
  int(0)
  public $modified =>
  bool(true)
  public $number =>
  string(1) "1"
  public $parentIdList =>
  array(1) {
    [0] =>
    string(1) "0"
  }
  public $segmentIdList =>
  array(0) {
  }
  public $texts =>
  array(1) {
    [0] =>
    class stdClass#619 (16) {
      public $Keywords =>
      string(0) ""
      public $categoryNumber =>
      string(1) "1"
      public $description =>
      string(67) "<html>
<head>
        <title></title>
</head>
<body></body>
</html>
"
      public $hidden =>
      bool(false)
      public $hiddenMobile =>
      bool(false)
      public $icon =>
      string(0) ""
      public $id =>
      int(809)
      public $image =>
      string(0) ""
      public $link =>
      NULL
      public $metaDescription =>
      string(0) ""
      public $name =>
      string(10) "Kategorier"
      public $siteId =>
      int(26)
      public $sortOrder =>
      int(1)
      public $string =>
      string(0) ""
      public $title =>
      string(0) ""
      public $urlname =>
      string(0) ""
    }
  }
}
*/

}
