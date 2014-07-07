<?php
namespace NethServer\Module;

/*
 * Copyright (C) 2011 Nethesis S.r.l.
 * 
 * This script is part of NethServer.
 * 
 * NethServer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * NethServer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with NethServer.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Implementation of FTP configuration.
 */
class FTP extends \Nethgui\Controller\TabsController
{
    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'Configuration', 50);
    }

    public function initialize()
    {
        parent::initialize();
        $user_type = $this->getPlatform()->getDatabase('configuration')->getProp('vsftpd', 'UserType');
        if ($user_type == 'virtual') {
            $this->addChild(new \NethServer\Module\FTP\Users());
            $this->addChild(new \NethServer\Module\FTP\Configure());
        } else {
            $this->addChild(new \NethServer\Module\FTP\Configure());
        }
    }

}

