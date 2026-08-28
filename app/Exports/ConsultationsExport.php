<?php

namespace App\Exports;

use App\Models\ConsultationRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ConsultationsExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths, WithStyles

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ConsultationRequest::latest()->get();
    }
    
    public function headings(): array
    {
        return ['Date', 'Nom & prénom', 'Téléphone', 'Rôle', 'Enjeu principal', 'Statut'];
    }

    public function map($consultation): array
    {
        return [
            $consultation->created_at->format('d/m/Y H:i'),
            $consultation->name,
            $consultation->phone,
            $consultation->role,
            $consultation->need,
            $consultation->statusLabel(),
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 18,
            'B' => 28,
            'C' => 18,
            'D' => 26,
            'E' => 32,
            'F' => 16,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // En-tête en gras, fond sombre, texte clair — cohérent avec le thème du site
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => 'E9F0F5']],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '11182B'],
            ],
            'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
        ]);

        $sheet->getRowDimension(1)->setRowHeight(24);
        $sheet->freezePane('A2'); // fige la ligne d'en-tête au défilement

        return [];
    }
}
