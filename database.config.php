<?php
/**
 * This file is part of the DreamFactory Services Platform(tm) (DSP)
 *
 * DreamFactory Services Platform(tm) <http://github.com/dreamfactorysoftware/dsp-core>
 * Copyright 2012-2014 DreamFactory Software, Inc. <support@dreamfactory.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
use DreamFactory\Platform\Enums\InstallationTypes;
use DreamFactory\Platform\Utility\Platform;

/**
 * database.config.php-dist
 *
 * If you do not want to use the default MySQL instance, you can override the settings with this template.
 * Copy this file to "config/database.config.php" and change the settings to your liking.
 *
 * Below are the actual default MySQL instance settings
 */

//  Need to make sure we have the autoloader set up in case this is called by the installer
if ( !class_exists( '\\Yii', false ) )
{
    require_once dirname( __DIR__ ) . '/vendor/autoload.php';
    require_once dirname( __DIR__ ) . '/vendor/dreamfactory/yii/framework/yiilite.php';
}

//  Set a key about where we live...
Platform::storeSet( INSTALL_TYPE_KEY, InstallationTypes::STANDALONE_PACKAGE );

return array(
    'connectionString'      => 'mysql:host='.getenv('DB_HOST').';port='.getenv('DB_PORT').';dbname='.getenv('DB_NAME'),
    'username'              => getenv('DB_USER'),
    'password'              => getenv('DB_PASS'),
    'emulatePrepare'        => true,
    'charset'               => 'utf8',
    'enableProfiling'       => defined( 'YII_DEBUG' ),
    'enableParamLogging'    => defined( 'YII_DEBUG' ),
    'schemaCachingDuration' => 3600,
);
