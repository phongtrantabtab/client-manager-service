<?php

namespace App\Http\Requests;

use App\Models\House\Definitions\HouseConst;
use Illuminate\Contracts\Validation\ValidationRule;

class HouseRequest extends AbsRequest
{
    protected mixed $currentStep;

    /**
     * Prepare for validation
     *
     * @return void
     */
    public function prepareForValidation()
    {
        $method = $this->getCurrentControllerMethod();
        $this->currentStep = $this->input('step', HouseConst::STEP_1);
        //        switch ($method) {
        //            case 'store':
        //                $this->redirectRoute = 'tool.seo.text.index';
        //                break;
        //            case 'update':
        //                $this->redirectRoute = 'tool.seo.text.csv-upload';
        //                break;
        //            default:
        //                break;
        //        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return match ($this->currentStep) {
            HouseConst::STEP_1 => $this->getStep1Rules(),
            HouseConst::STEP_2 => $this->getStep2Rules(),
            HouseConst::STEP_3 => $this->getStep3Rules(),
            default => ['step' => 'required'],
        };
    }

    /**
     * Get step 1 rules
     *
     * @return string[]
     */
    protected function getStep1Rules(): array
    {
        return [
            'address.province' => 'required',
            'address.district' => 'required',
            'address.ward' => 'required',
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'category' => 'required',
            'phone' => 'required',
        ];
    }

    /**
     * Get step 2 rules
     *
     * @return string[]
     */
    protected function getStep2Rules(): array
    {
        return [
            'address.province' => 'required',
            'address.district' => 'required',
            'address.ward' => 'required',
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'category' => 'required',
        ];
    }

    /**
     * Get step 3 rules
     *
     * @return string[]
     */
    protected function getStep3Rules(): array
    {
        return [
            'address.province' => 'required',
            'address.district' => 'required',
            'address.ward' => 'required',
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'category' => 'required',
        ];
    }
}
