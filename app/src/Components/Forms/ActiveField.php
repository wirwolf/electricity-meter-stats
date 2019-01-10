<?php
/**
 * Created by PhpStorm.
 * User: wir_wolf
 * Date: 10.01.19
 * Time: 15:44
 */

namespace App\Components\Forms;


use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField
{
    /**
     * @var string the template that is used to arrange the label, the input field, the error message and the hint text.
     * The following tokens will be replaced when [[render()]] is called: `{label}`, `{input}`, `{error}` and `{hint}`.
     */
    public $template = "{label}\n{input}\n{icon}\n{hint}\n{error}";

    public $iconOption = ['tag' => null, 'content' => '', 'options' => []];

    /**
     * Renders the whole field.
     * This method will generate the label, error tag, input tag and hint tag (if any), and
     * assemble them into HTML according to [[template]].
     * @param string|callable $content the content within the field container.
     * If `null` (not set), the default methods will be called to generate the label, error tag and input tag,
     * and use them as the content.
     * If a callable, it will be called to generate the content. The signature of the callable should be:
     *
     * ```php
     * function ($field) {
     *     return $html;
     * }
     * ```
     *
     * @return string the rendering result.
     */
    public function render($content = null)
    {

        if ($content === null) {
            if (!isset($this->parts['{input}'])) {
                $this->textInput();
            }
            if (!isset($this->parts['{label}'])) {
                $this->label();
            }
            if (!isset($this->parts['{error}'])) {
                $this->error();
            }
            if (!isset($this->parts['{hint}'])) {
                $this->hint(null);
            }
            if (!isset($this->parts['{icon}'])) {
                $this->icon();
            }

            $content = strtr($this->template, $this->parts);
        } elseif (!is_string($content)) {
            $content = call_user_func($content, $this);
        }

        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }

    public function icon($options = []) {

        $options = array_merge($this->iconOption, $options);
        $this->parts['{icon}'] = Html::tag($options['tag'], $options['content'] ?? '', $options['options'] ?? []);
    }
}