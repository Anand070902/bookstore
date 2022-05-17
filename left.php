<div class="list-group">
                        <?php   
                        $calling = mysqli_query($connect,"select * from genres");
                        while($rowG = mysqli_fetch_array($calling)){
                                ?>
                                <a href="?cat_id=<?= $rowG['id'];?>" class="list-group-item list-group-item-action"><?=$rowG['cat_title'];?>
                                 <span class="float-end"><?php

                                    $querycount = mysqli_query($connect,"select * from books where genre_id='".$rowG['id']."'");
                                    $count = mysqli_num_rows($querycount);
                                    if($count > 0){
                                            echo "($count)";
                                    }
                                 ?></span>
                                </a>
                         <?php
                        }
                        ?>
                        </div>