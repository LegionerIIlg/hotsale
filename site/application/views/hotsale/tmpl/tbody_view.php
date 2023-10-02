<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>

                        <?php if (!empty($tble_users))
                               foreach ($tble_users as $ku => $v):
                                   ?> 
                                   <tr data-id='<?= $v['id']; ?>'>
                                       <th><?= $v['id']; ?></th>
                                       <td><?= $v['name']; ?></td>
                                       <th><?= $v['surname']; ?></th>
                                       <td><?= $v['email']; ?></td>
                                       <td><?= $v['paswrd']; ?></td>

                                       <td class="center text-center">
                                           <span class="btn-group">
                                                 <a title="Редагувати основні дані" 
                                              class="btn btn btn-outline-primary"
                                              onclick="functionChangeMain(this)">
                                                   <span><i class="fa fa-pencil-alt"></i></span>      
                                               </a>
                                               <a title="Змінити пароль" 
                                                  class="btn btn-danger"
                                                  onclick="functionChangePass(this)">
                                                   <span><i class="fa fa-key"></i></span>      
                                               </a>
                                               <a title="Змінити пароль" 
                                                  class="btn btn-dark"
                                                  onclick="functionDestroy(this)">
                                                   <span><i class="fa fa-trash"></i></span>      
                                               </a>
                                           </span>

                                       </td>
                                   </tr>

       <?php endforeach; ?>
                  