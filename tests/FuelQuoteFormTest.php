<?php

class FuelQuoteFormTest extends PHPUnit\Framework\TestCase {
    // Test case to simulate form submission with in-state address
    public function testInStateFormSubmission() {
        $_POST['gallons_requested'] = 100;
        $_POST['same_address'] = true;
        $_POST['delivery_date'] = '2024-03-20';
        include 'FuelQuoteForm.php';
        $this->assertSame(1.47, $price_per_gallon);
        $this->assertSame(147.00, $gallons_requested * $price_per_gallon);
    }

    // Test case to simulate form submission with out-of-state address
    public function testOutOfStateFormSubmission() {
        $_POST['gallons_requested'] = 150;
        $_POST['same_address'] = false;
        $_POST['delivery_date'] = '2024-03-22';
        include 'FuelQuoteForm.php';
        $this->assertEquals(2.67, $price_per_gallon);
        $this->assertEquals(400.50, $gallons_requested * $price_per_gallon);
    }

    // Test case to verify HTML output
    public function testHtmlOutput() {
        ob_start();
        include 'FuelQuoteForm.php';
        $output = ob_get_clean();
        // $this->assertStringContainsString('<h1>Fuel Quote Form</h1>', $output);
        $this->assertStringContainsString('<label>Gallons Requested:</label>', $output);
        $this->assertStringContainsString('<label>Same address as listed?</label>', $output);
        $this->assertStringContainsString('<label>Delivery Date:</label>', $output);
        $this->assertStringContainsString('Price per Gallon:', $output);
        $this->assertStringContainsString('Total Cost:', $output);
    }

    // Test case to simulate form submission with invalid data
    public function testInvalidFormSubmission() {
        $_POST['gallons_requested'] = 'abc'; // Non-numeric value
        $_POST['same_address'] = false;
        $_POST['delivery_date'] = '2024-03-22';
        include 'FuelQuoteForm.php';
        $this->assertEquals(0, $price_per_gallon);
        $this->assertEquals(0, $gallons_requested * $price_per_gallon);
    }

    // Test case to simulate form submission with zero gallons requested
    public function testZeroGallonsRequested() {
        $_POST['gallons_requested'] = 0;
        $_POST['same_address'] = true;
        $_POST['delivery_date'] = '2024-03-20';
        include 'FuelQuoteForm.php';
        $this->assertEquals(0, $price_per_gallon);
        $this->assertEquals(0, $gallons_requested * $price_per_gallon);
    }
}