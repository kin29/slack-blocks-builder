<?php

declare(strict_types=1);

namespace Kin29\SlackBlocksBuilder\Message;

use Kin29\SlackBlocksBuilder\Message\SlackElement\SlackElement;

class SlackBlock extends AbstractSlackMessage
{
    /**
     * @var string $type
     * @example actions,context,divider,file,header,image,input,section
     * @required
     */
    protected string $type;

    /**
     * @var SlackElement[]
     * type="action,context"の時必須
     */
    protected array $elements;

    /**
     * @var string
     */
    protected string $block_id;

    /**
     * @var string
     * type="file"の時必須
     */
    protected string $external_id;

    /**
     * @var string
     * type="file"の時必須
     */
    protected string $source;

    /**
     * @var array
     * type="header"の時必須
     */
    protected array $text;

    /**
     * @var string
     * type="image"の時必須
     */
    protected string $image_url;

    /**
     * @var string
     * type="image"の時必須
     */
    protected string $alt_text;

    /**
     * @var array
     */
    protected array $title;

    /**
     * @var array
     * type="input"の時必須
     */
    protected array $label;

    /**
     * @var array
     * type="input"の時必須
     */
    protected array $element;

    /**
     * @var bool
     */
    protected bool $dispatch_action = false;

    /**
     * @var array
     */
    protected array $hint;

    /**
     * @var bool
     */
    protected bool $optional = false;

    /**
     * @var array
     */
    protected array $fields;

    /**
     * @var array
     * type="section"の時
     */
    protected array $accessory;

    /**
     * @param string $type
     * @return SlackBlock
     */
    public function type(string $type): SlackBlock
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param SlackElement[] $elements
     * @return SlackBlock
     */
    public function elements(array $elements): SlackMessageInterface
    {
        foreach ($elements as $element) {
            if (!$element instanceof SlackElement) {
                throw new \LogicException('Must hold only SlackElement instances.');
            }

            $this->elements[] = $element->payload();
        }

        return $this;
    }

    /**
     * @param string $block_id
     * @return SlackBlock
     */
    public function blockId(string $block_id): SlackBlock
    {
        $this->block_id = $block_id;
        return $this;
    }

    /**
     * @param string $external_id
     * @return SlackBlock
     */
    public function externalId(string $external_id): SlackBlock
    {
        $this->external_id = $external_id;
        return $this;
    }

    /**
     * @param string $source
     * @return SlackBlock
     */
    public function source(string $source): SlackBlock
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param SlackText $text
     * @return SlackBlock
     */
    public function text(SlackText $text): SlackBlock
    {
        $this->text = $text->payload();
        return $this;
    }

    /**
     * @param string $image_url
     * @return SlackBlock
     */
    public function imageUrl(string $image_url): SlackBlock
    {
        $this->image_url = $image_url;
        return $this;
    }

    /**
     * @param string $alt_text
     * @return SlackBlock
     */
    public function altText(string $alt_text): SlackBlock
    {
        $this->alt_text = $alt_text;
        return $this;
    }

    /**
     * @param SlackText $title
     * @return SlackBlock
     */
    public function title(SlackText $title): SlackBlock
    {
        $this->title = $title->payload();
        return $this;
    }

    /**
     * @param SlackText $label
     * @return SlackBlock
     */
    public function label(SlackText $label): SlackBlock
    {
        $this->label = $label->payload();
        return $this;
    }

    /**
     * @param SlackElement $element
     * @return SlackBlock
     */
    public function element(SlackElement $element): SlackBlock
    {
        $this->element = $element->payload();
        return $this;
    }

    /**
     * @param bool $dispatch_action
     * @return SlackBlock
     */
    public function dispatchAction(bool $dispatch_action): SlackBlock
    {
        $this->dispatch_action = $dispatch_action;
        return $this;
    }

    /**
     * @param SlackText $hint
     * @return SlackBlock
     */
    public function hint(SlackText $hint): SlackBlock
    {
        $this->hint = $hint->payload();
        return $this;
    }

    /**
     * @param bool $optional
     * @return SlackBlock
     */
    public function optional(bool $optional): SlackBlock
    {
        $this->optional = $optional;
        return $this;
    }

    /**
     * @param SlackText[] $fields
     * @return SlackBlock
     */
    public function fields(array $fields): SlackBlock
    {
        foreach ($fields as $field) {
            if (!$field instanceof SlackText) {
                throw new \LogicException('Must hold only SlackText instances.');
            }

            $this->fields[] = $field->payload();
        }

        return $this;
    }

    /**
     * @param SlackElement $accessory
     * @return SlackBlock
     */
    public function accessory(SlackElement $accessory): SlackBlock
    {
        $this->accessory = $accessory->payload();
        return $this;
    }
}
