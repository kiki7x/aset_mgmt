<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsettiksResource extends JsonResource
{

    public function toArray(Request $request)
    {
        return [
                'id' => $this->id,
                'classification_id' => $this->classification,
                'category_id' => $this->category,
                'admin_id' => $this->admin_id,
                'client_id' => $this->client,
                'user_id' => $this->user_id,
                'manufacturer_id' => $this->manufacturer_id,
                'model_id' => $this->model,
                'supplier_id' => $this->supplier_id,
                'status_id' => $this->status,
                'purchase_date' => $this->purchase_date,
                'warranty_months' => $this->warranty_months,
                'tag' => $this->tag,
                'name' => $this->name,
                'serial' => $this->serial,
                'notes' => $this->notes,
                'location_id' => $this->location_id,
                'customfields' => $this->customfields,
                'qrvalue' => $this->qrvalue,
        ];
    }
}
