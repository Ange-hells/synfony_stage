<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="labble", type="string", length=10, nullable=true, options={"default"="NULL","fixed"=true})
     */
    private $labble = 'NULL';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabble(): ?string
    {
        return $this->labble;
    }

    public function setLabble(?string $labble): self
    {
        $this->labble = $labble;

        return $this;
    }


}
