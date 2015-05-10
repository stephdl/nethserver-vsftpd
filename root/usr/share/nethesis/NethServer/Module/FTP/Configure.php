<?php
namespace NethServer\Module\FTP;

/*
 * Copyright (C) 2012 Nethesis S.r.l.
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

use Nethgui\System\PlatformInterface as Validate;

/**
 * Enable or disable FTP server
 *
 * @author Giacomo Sanchietti <giacomo.sanchietti@nethesis.it>
 */
class Configure extends \Nethgui\Controller\AbstractController
{
    public function initialize()
    {
        $this->declareParameter('port', Validate::PORTNUMBER, array('configuration', 'vsftpd', 'TCPPort'));
        $this->declareParameter('status', Validate::SERVICESTATUS, array('configuration', 'vsftpd', 'status'));
    }

    protected function onParametersSaved($changedParameters)
    {
        $this->getPlatform()->signalEvent('nethserver-vsftpd-update');
        $this->getPlatform()->signalEvent('firewall-adjust');
    }

}

