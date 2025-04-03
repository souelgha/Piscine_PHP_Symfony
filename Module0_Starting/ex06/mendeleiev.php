<?php

$handle=file_get_contents("ex06-mod.txt");
// echo $handle;
$number=explode("\n", $handle);
print_r($number);


// <table>
// <tr>
//     <td style="border: 1px solid black; padding:10px">
//         <h4>Hydrogen</h4>
//             <ul>
//                 <li>No 42</li>
//                 <li>H</li>
//                 <Li> 1.00794 </ li>
//                 <li>1 electron</li>
//             <ul>
//     </td>