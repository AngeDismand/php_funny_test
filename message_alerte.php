<?php
if(isset($_GET['reg_err']))
            {
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err)

                {
                
                    case "success":
                    ?>
                        <script>
                            swal ( {
                                title : " Success ! " , 
                                text : " The value is added successfully " , 
                                icon: "success",
                                button : "OK " , 
                                } ) ;												
                        </script>
                    <?php
                    break;
                    case "delete":
                    ?>
                        <script>
                            swal ( {
                                title : " Success ! " , 
                                text : " The value is removed successfully" , 
                                icon: "success",
                                button : "OK " , 
                                } ) ;												
                        </script>
                    <?php
                    break;
                    case "edit":
                        ?>
                            <script>
                                swal ( {
                                    title : " Success ! " , 
                                    text : " The value is updated successfully " , 
                                    icon: "success",
                                    button : "OK " , 
                                    } ) ;												
                            </script>
                        <?php
                        break;
                    case "error":
                    ?>
                        <script>
                            swal ( {
                                title : " Sorry ! " , 
                                text : "Something's wrong " , 
                                icon: "error",
                                button : "OK " , 
                                } ) ;												
                        </script>
                    <?php
                    break;
                    case "invalid_extension":
                        ?>
                            <script>
                                swal ( {
                                    title : " Sorry ! " , 
                                    text : "The file extension is not valid " , 
                                    icon: "error",
                                    button : "OK " , 
                                    } ) ;												
                            </script>
                        <?php
                        break;
                        case "invalid_tail":
                            ?>
                                <script>
                                    swal ( {
                                        title : " Sorry ! " , 
                                        text : "The file is too large " , 
                                        icon: "error",
                                        button : "OK " , 
                                        } ) ;												
                                </script>
                            <?php
                            break;
                    
                }
                    
						 }
?>