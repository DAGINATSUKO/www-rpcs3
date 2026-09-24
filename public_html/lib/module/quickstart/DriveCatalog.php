<?php
include_once 'Drive.php';

class DriveCatalog
{
    private const int COLUMNS = 3;

    /** @var list<Drive> */
    private array $drives = [];

    public function add_drive(string $vendor, string $model, DriveType $type, string $variants = ''): void
    {
        $vendor = trim($vendor);
        $model = trim($model);
        $variants = trim($variants);

        $this->drives[] = new Drive($vendor, $model, $type, $variants);
    }

    /**
     * @return list<Drive>
     */
    public function all(): array
    {
        return $this->drives;
    }

    public function print(): void
    {
        $html = '';

        foreach ($this->grouped_by_vendor() as $vendor => $drives)
        {
            $html .= $this->render_vendor_section($vendor, $drives);
        }

        print $html;
    }

    /**
     * @return array<string, list<Drive>>
     */
    private function grouped_by_vendor(): array
    {
        /** @var array<string, list<Drive>> $grouped */
        $grouped = [];

        foreach ($this->drives as $drive)
        {
            $grouped[$drive->vendor] ??= [];
            $grouped[$drive->vendor][] = $drive;
        }

        return $grouped;
    }

    /**
     * @param list<Drive> $drives
     */
    private function render_vendor_section(string $vendor, array $drives): string
    {
        $anchor  = sprintf("dumping_bdd_%s", strtolower($vendor));
        $heading = sprintf("%s Drives", self::escape($vendor));

        $html = <<<HTML
<div class="drives-con-container">
    <div class="container-tx3-block darkmode-txt">
        <div class="anchor-point" id="{$anchor}">
        </div>
        <div class='container-emp-block'>
        </div>
        <span>
        {$heading} </span>
    </div>

HTML;

        foreach (array_chunk($drives, self::COLUMNS) as $chunk)
        {
            $html .= $this->render_row($chunk);
        }

        $html .= "</div>\n";

        return $html;
    }

    /**
     * @param list<Drive> $drives
     */
    private function render_row(array $drives): string
    {
        $html = "\t<div class=\"drives-con-outer darkmode-txt\">\n";

        foreach ($drives as $drive)
        {
            $html .= $this->render_drive($drive);
        }

        $padding = self::COLUMNS - count($drives);

        for ($i = 0; $i < $padding; ++$i)
        {
            $html .= $this->render_placeholder();
        }

        $html .= "\t</div>\n";

        return $html;
    }

    private function render_drive(Drive $drive): string
    {
        $label = self::escape($drive->model);

        if ($drive->is_external())
        {
            $label .= ' ' . self::render_revision('External');
        }

        if ($drive->variants !== '')
        {
            $label .= ' ' . self::render_revision($drive->variants);
        }

        return <<<HTML
        <div class="drives-con-inner darkmode-txt">
            <div class="drives-ico-bluray">
            </div>
            <span>{$label}</span>
        </div>

HTML;
    }

    private function render_placeholder(): string
    {
        return <<<HTML
        <div class="drives-con-inner drives-txt-hidden">
            <span>ADD BD DRIVE HERE</span>
        </div>

HTML;
    }

    private static function render_revision(string $text): string
    {
        return '<span class="drives-txt-revisions">' . self::escape($text) . '</span>';
    }

    private static function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}