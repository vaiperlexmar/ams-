<?php

namespace Authentication;

class User implements UserInterface
{
    private string $username;
    private string $password;
    private array $roles;
    private bool $enabled = true;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function setRoles(array $roles): self
    {
        if (count($roles) === 1) {
            $this->roles = [$roles[0]];
        } else {
            $this->roles = [$roles[0], $roles[1]];
        }

        return $this;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;
        return $this;
    }
}