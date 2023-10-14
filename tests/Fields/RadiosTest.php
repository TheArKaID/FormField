<?php

namespace Tests\Fields;

use Tests\TestCase;

class RadiosTest extends TestCase
{
    /** @test */
    public function it_returns_radios_field_with_array_of_radio_options()
    {
        $generatedString = '<div class="form-group mb-3 ">';
        $generatedString .= '<label for="radios" class="form-label fw-bold">Radios</label><div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_1" class="form-check-input" name="radios" type="radio" value="1"><label for="radios_1" class="form-check-label">Satu</label></div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_2" class="form-check-input" name="radios" type="radio" value="2"><label for="radios_2" class="form-check-label">Dua</label></div>';
        $generatedString .= '</div></div>';

        $this->assertEquals(
            $generatedString,
            $this->formField->radios('radios', [1 => 'Satu', 2 => 'Dua'])
        );
    }

    /** @test */
    public function it_returns_radios_field_with_collection_of_radio_options()
    {
        $generatedString = '<div class="form-group mb-3 ">';
        $generatedString .= '<label for="radios" class="form-label fw-bold">Radios</label><div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_1" class="form-check-input" name="radios" type="radio" value="1"><label for="radios_1" class="form-check-label">Satu</label></div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_2" class="form-check-input" name="radios" type="radio" value="2"><label for="radios_2" class="form-check-label">Dua</label></div>';
        $generatedString .= '</div></div>';

        $this->assertEquals(
            $generatedString,
            $this->formField->radios('radios', collect([1 => 'Satu', 2 => 'Dua']))
        );
    }

    /** @test */
    public function it_returns_radios_field_with_default_value()
    {
        $generatedString = '<div class="form-group mb-3 ">';
        $generatedString .= '<label for="radios" class="form-label fw-bold">Radios</label><div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_1" class="form-check-input" name="radios" type="radio" value="1"><label for="radios_1" class="form-check-label">Satu</label></div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_2" class="form-check-input" checked="checked" name="radios" type="radio" value="2"><label for="radios_2" class="form-check-label">Dua</label></div>';
        $generatedString .= '</div></div>';

        $this->assertEquals(
            $generatedString,
            $this->formField->radios('radios', [1 => 'Satu', 2 => 'Dua'], ['value' => 2])
        );
    }

    /** @test */
    public function it_returns_radios_field_with_info_text_line()
    {
        $generatedString = '<div class="form-group mb-3 ">';
        $generatedString .= '<label for="radios" class="form-label fw-bold">Radios</label><div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_1" class="form-check-input" name="radios" type="radio" value="1"><label for="radios_1" class="form-check-label">Satu</label></div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_2" class="form-check-input" name="radios" type="radio" value="2"><label for="radios_2" class="form-check-label">Dua</label></div></div>';
        $generatedString .= '<p class="text-info small">Field text info.</p>';
        $generatedString .= '</div>';

        $this->assertEquals(
            $generatedString,
            $this->formField->radios('radios', [1 => 'Satu', 2 => 'Dua'], [
                'info' => ['text' => 'Field text info.'],
            ])
        );
    }

    /** @test */
    public function it_returns_radios_field_with_required_attribute()
    {
        $generatedString = '<div class="form-group mb-3 required ">';
        $generatedString .= '<label for="radios" class="form-label fw-bold">Radios <span class="text-danger">*</span></label><div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_1" class="form-check-input" required name="radios" type="radio" value="1"><label for="radios_1" class="form-check-label">Satu</label></div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_2" class="form-check-input" required name="radios" type="radio" value="2"><label for="radios_2" class="form-check-label">Dua</label></div>';
        $generatedString .= '</div></div>';

        $this->assertEquals(
            $generatedString,
            $this->formField->radios('radios', [1 => 'Satu', 2 => 'Dua'], [
                'required' => true,
            ])
        );
    }

    /** @test */
    public function it_shows_radio_with_validation_error()
    {
        // Mock error message on "radios" attribute.
        $errorBag = new \Illuminate\Support\MessageBag();
        $errorBag->add('radios', 'The radios field is required.');

        $this->formField->errorBag = $errorBag;

        $generatedString = '<div class="form-group mb-3 has-error">';
        $generatedString .= '<label for="radios" class="form-label fw-bold">Radios</label><div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_1" class="form-check-input is-invalid" name="radios" type="radio" value="1"><label for="radios_1" class="form-check-label">Satu</label></div>';
        $generatedString .= '<div class="form-check form-check-inline"><input id="radios_2" class="form-check-input is-invalid" name="radios" type="radio" value="2"><label for="radios_2" class="form-check-label">Dua</label></div></div>';
        $generatedString .= '<span class="small text-danger" role="alert">The radios field is required.</span>';
        $generatedString .= '</div>';

        $this->assertEquals(
            $generatedString,
            $this->formField->radios('radios', [1 => 'Satu', 2 => 'Dua'])
        );
    }
}
