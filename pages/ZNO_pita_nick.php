<?php 
    require "../components/header.php";
?>
<div class="col-10 search_padding results_view">
    <div class="row food_table_header_right">
        <div class="col-11">
            <div class="row">
                <div class="col-1 food_table_column_header">
                    Image
                </div>

                <div class="col-3 food_table_column_header">
                    Title
                </div>

                <div class="col-8">

                    <div class="row">

                        <div class="col-1"></div>

                        <a href="/food/browse/?type=recipe&group=Appetizers&order_by=-calories" class="col-2 food_table_column_header sort_nutrient_link">
                            Calories
                            
                                <div class="hidden_arrow light_icon"><i class="fa fa-chevron-down"></i>
                                </div>
                            
                        </a>


                        <a href="/food/browse/?type=recipe&group=Appetizers&order_by=-carbs" class="col-2 food_table_column_header sort_nutrient_link">
                            Carbs
                            
                                <div class="hidden_arrow light_icon"><i class="fa fa-chevron-down"></i>
                                </div>
                            
                        </a>

                        <a href="/food/browse/?type=recipe&group=Appetizers&order_by=-fats" class="col-2 food_table_column_header sort_nutrient_link">
                            Fat
                            
                                <div class="hidden_arrow light_icon"><i class="fa fa-chevron-down"></i>
                                </div>
                            
                        </a>

                        <a href="/food/browse/?type=\recipe&group=Appetizers&order_by=-proteins" class="col-2 food_table_column_header sort_nutrient_link">
                            Protein
                            
                                <div class="hidden_arrow light_icon"><i class="fa fa-chevron-down"></i>
                                </div>
                            
                        </a>


                        <div class="col-3 food_table_column_header">
                            <select name="sort_by_nutrient" class="form-control sort_by_nutrient">
                                

                                    
                                        <option selected="" value="fiber">Fiber</option>
                                    

                                

                                    
                                        <option value="sodium">Sodium</option>
                                    

                                

                                    
                                        <!-- добавил еще один option -->
                                        <option value="sugar">Sugar</option>
                                    
                            </select>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- добавил еще один div для кнопки -->
        <div class="col-1 food_table_column_header">
            <button type="button" class="btn btn-primary">Search</button>
        </div>

    </div>
</div>
<?php 
    require "../components/footer.php";
?>
