/* MDU auto select, written by Brett Bryant */

function updateMDU() {
    $('select[name=multi-dwelling-unit]').val(
        (
            ['Tellabs 621',
             'Tellabs 625',
             'Motorola 6000BET',
             'Motorola 6000BVT',
             'Motorola 6000VDSL', 
             'Motorola 6000MDU', 
             'ALTL O-821G-D', 
             'ALTL O-821M'].indexOf(
                $('select[name=Optical-Network-Terminal').val()
            ) > -1) ? 
                'Yes' : 
                'No'
    ); 
    
    if (!$('select[name=Optical-Network-Terminal]').val()) 
        $('select[name=multi-dwelling-unit]').val('');
 
    return;
}
