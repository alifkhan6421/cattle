<?php

namespace App\Exports;

use App\Helpers\CommonHelper;
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class BreedExport implements FromCollection, WithHeadings, WithEvents
{
    use RegistersEventListeners;

    protected $query;

    function __construct($query) {
        $this->query = $query;
    }

    /**
    * @return Collection
    */
    public function collection()
    {
        $items = $this->query->get();
        $items->transform(function($item) {
            unset($item->id);
            unset($item->comments);
            unset($item->created_at);
            unset($item->updated_at);

            $item->cattle_id = $item->cattle->title;
            $item->created_by = $item->creator->name;
            return $item;
        });
        return $items;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Cattle Id',
            'Breeding Date',
            'Breeding Type',
            'Breeding Status',
            'Expected Birth Date',
            'Cost',
            'Ai Worker',
            'Comments',
            'Created by'
        ];
    }

    /**
     * @param AfterSheet $event
     * @throws Exception
     */
    public static function afterSheet(AfterSheet $event)
    {
        CommonHelper::setUpExcelSheet($event);
    }
}
