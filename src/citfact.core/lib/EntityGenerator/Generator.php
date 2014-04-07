<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\EntityGenerator;

/*

 namespace
 use_statement
 class_name - required
 table_name - required
 entity_map

 */

class Generator
{
    /**
     * List required methods for generate entity
     *
     * @var array
     */
    protected $requiredMethods = array('getFilePath', 'getTableName', 'getMap');

    /**
     * The extension to use for written php files.
     *
     * @var string
     */
    protected $extension = '.php';

    /**
     * Number of spaces to use for indention in generated code.
     *
     * @var int
     */
    protected $numSpaces = 4;

    /**
     * The actual spaces to use for indention.
     *
     * @var string
     */
    protected $spaces = ' ';

    /**
     * @var string
     */
    protected static $classTemplate = <<<EOF
<?php

<namespace>
use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
<useStatement>

Loc::loadMessages(__FILE__);

<entityClassName> extends Entity\DataManager
{
<entityBody>
}
EOF;

    protected static $methodTemplate = <<<EOF
/**
 * {@inheritdoc}
 */
public static function <methodName>()
{
<spaces>return <methodBody>;
}
EOF;

    /**
     * Generates and writes entity classes.
     *
     * @param array $metadatas
     * @param string $outputDirectory
     * @return void
     */
    public function generate($metadatas, $outputDirectory)
    {
        if (is_array($metadatas)) {
            foreach ($metadatas as $metadata) {
                $this->writeEntityClass($metadata, $outputDirectory);
            }
        } else {
            $this->writeEntityClass($metadatas, $outputDirectory);
        }
    }

    /**
     * Generates and writes entity class to disk.
     *
     * @param $metadata
     * @param string $outputDirectory
     * @return void
     */
    public function writeEntityClass($metadata, $outputDirectory)
    {
    }

    /**
     * Sets the number of spaces the exported class should have.
     *
     * @param integer $numSpaces
     * @return void
     */
    public function setNumSpaces($numSpaces)
    {
        $this->spaces = str_repeat(' ', $numSpaces);
        $this->numSpaces = $numSpaces;
    }

    /**
     * Sets the extension to use when writing php files to disk.
     *
     * @param string $extension
     * @return void
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }
}