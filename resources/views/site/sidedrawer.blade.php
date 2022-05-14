@extends('layouts.app')

@section('content')

 {{--   <section class="sidedrawer">
        <div class="sidedrawer__container __container">
            <div class="sidedrawer__sizelisting sizelisting">
                <div class="sizelisting__size-guide-top">
                    <h1>МУЖЧИНЫ</h1>
                    <div class="sizelisting__row">
                        <div class="sizelisting__size-guide-top-content">
                            <p>Мерки необходимо снимать непосредственно по вашей фигуре.</p>
                            <p><b>А:</b> грудь - измерьте объем груди в ее самой широкой части.</p>
                            <p><b>Б:</b> талия - измерьте объем талии в ее самой узкой части.</p>
                            <p><b>В: </b>бедра - объем бедер необходимо определить по точкам максимальной ширины бедер</p>
                            <p><b>Г:</b> длина штанины по внутреннему шву измеряется от паховой области до пола</p>
                        </div>
                        <div class="sizelisting__size-guide-top-img">
                            <img src="./img/sidedrawer/1.png" alt="Размерное изображение" title="size-guide-men-new">
                        </div>
                    </div>
                </div>
                <section class="sizelisting__other-size-guide">
                    <ul class="sizelisting__list">
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">РУБАШКИ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <table class="sizelisting__table">
                                    <tbody>
                                    <tr>
                                        <th><b>&nbsp;</b></th>
                                        <th><b>XS</b></th>
                                        <th><b>S</b></th>
                                        <th><b>M</b></th>
                                        <th><b>L</b></th>
                                        <th><b>XL</b></th>
                                        <th><b>2XL</b></th>
                                    </tr>
                                    <tr>
                                        <th><b>EUR</b></th>
                                        <td><b>35/36</b></td>
                                        <td><b>37/38</b></td>
                                        <td><b>39/40</b></td>
                                        <td><b>41/42</b></td>
                                        <td><b>43/44</b></td>
                                        <td><b>45/46</b></td>
                                    </tr>
                                    <tr>
                                        <th>Грудь см</th>
                                        <td>80-84</td>
                                        <td>88-92</td>
                                        <td>96-100</td>
                                        <td>104-108</td>
                                        <td>112-116</td>
                                        <td>120-124</td>
                                    </tr>
                                    <tr>
                                        <th>Талия см</th>
                                        <td>68-72</td>
                                        <td>76-80</td>
                                        <td>84-88</td>
                                        <td>92-96</td>
                                        <td>100-104</td>
                                        <td>108-112</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">ТОПЫ, КУРТКИ И ПИДЖАКИ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th><b>&nbsp;</b></th>
                                            <th><b>XS</b></th>
                                            <th colspan="2"><b>S</b></th>
                                            <th colspan="2"><b>M</b></th>
                                            <th colspan="2"><b>L</b></th>
                                            <th colspan="2"><b>XL</b></th>
                                            <th colspan="2"><b>2XL</b></th>
                                        </tr>
                                        <tr>
                                            <th><b>EUR</b></th>
                                            <td><b>42</b></td>
                                            <td><b>44</b></td>
                                            <td><b>46</b></td>
                                            <td><b>48</b></td>
                                            <td><b>50</b></td>
                                            <td><b>52</b></td>
                                            <td><b>54</b></td>
                                            <td><b>56</b></td>
                                            <td><b>58</b></td>
                                            <td><b>60</b></td>
                                            <td><b>62</b></td>
                                        </tr>
                                        <tr>
                                            <th>Рост см</th>
                                            <td>177</td>
                                            <td>178</td>
                                            <td>179</td>
                                            <td>180</td>
                                            <td>181</td>
                                            <td>182</td>
                                            <td>183</td>
                                            <td>184</td>
                                            <td>185</td>
                                            <td>186</td>
                                            <td>187</td>
                                        </tr>
                                        <tr>
                                            <th>Грудь см</th>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                            <td>100</td>
                                            <td>104</td>
                                            <td>108</td>
                                            <td>112</td>
                                            <td>116</td>
                                            <td>120</td>
                                            <td>124</td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>72</td>
                                            <td>76</td>
                                            <td>80</td>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                            <td>100</td>
                                            <td>104</td>
                                            <td>108</td>
                                            <td>112</td>
                                        </tr>
                                        <tr>
                                            <th>Вырез горловины см</th>
                                            <td>35</td>
                                            <td>36</td>
                                            <td>37</td>
                                            <td>38</td>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>41</td>
                                            <td>42</td>
                                            <td>43</td>
                                            <td>44</td>
                                            <td>45</td>
                                        </tr>
                                        <tr>
                                            <th>Длина рукава см</th>
                                            <td>62</td>
                                            <td>62.5</td>
                                            <td>63</td>
                                            <td>63.5</td>
                                            <td>64</td>
                                            <td>64.5</td>
                                            <td>65</td>
                                            <td>65.5</td>
                                            <td>66</td>
                                            <td>66.5</td>
                                            <td>67</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">БРЮКИ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th><b>&nbsp;</b></th>
                                            <th><b>XS</b></th>
                                            <th colspan="2"><b>S</b></th>
                                            <th colspan="2"><b>M</b></th>
                                            <th colspan="2"><b>L</b></th>
                                            <th colspan="2"><b>XL</b></th>
                                            <th colspan="2"><b>2XL</b></th>
                                        </tr>
                                        <tr>
                                            <th><b>EUR</b></th>
                                            <td><b>42</b></td>
                                            <td><b>44</b></td>
                                            <td><b>46</b></td>
                                            <td><b>48</b></td>
                                            <td><b>50</b></td>
                                            <td><b>52</b></td>
                                            <td><b>54</b></td>
                                            <td><b>56</b></td>
                                            <td><b>58</b></td>
                                            <td><b>60</b></td>
                                            <td><b>62</b></td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>72</td>
                                            <td>76</td>
                                            <td>80</td>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                            <td>100</td>
                                            <td>104</td>
                                            <td>108</td>
                                            <td>112</td>
                                        </tr>
                                        <tr>
                                            <th>Бедра см</th>
                                            <td>90</td>
                                            <td>93</td>
                                            <td>96</td>
                                            <td>99</td>
                                            <td>102</td>
                                            <td>105</td>
                                            <td>108</td>
                                            <td>111</td>
                                            <td>114</td>
                                            <td>117</td>
                                            <td>120</td>
                                        </tr>
                                        <tr>
                                            <th>Длина по внутреннему шву см</th>
                                            <td>81</td>
                                            <td>81</td>
                                            <td>82</td>
                                            <td>82</td>
                                            <td>83</td>
                                            <td>83</td>
                                            <td>84</td>
                                            <td>85</td>
                                            <td>85</td>
                                            <td>86</td>
                                            <td>86</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">КОНВЕРТАЦИЯ РАЗМЕРОВ В ДЮЙМАХ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <p>Размеры джинсов часто указываются в дюймах, например, 30/32. Первая цифра обозначает объем
                                    талии, а вторая — длину изделия по внутреннему шву штанин.<br>
                                    <br>
                                </p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>XS</th>
                                            <th>S</th>
                                            <th>M</th>
                                            <th>L</th>
                                            <th>XL</th>
                                            <th>XXL</th>
                                        </tr>
                                        <tr>
                                            <th>Размер</th>
                                            <td>26", 27"</td>
                                            <td>28", 29", 30"</td>
                                            <td>31", 32", 33"</td>
                                            <td>34", 36"</td>
                                            <td>38", 40"</td>
                                            <td>42"</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">РАЗМЕРЫ ДЛЯ НЕВЫСОКИХ МУЖЧИН
                                </button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <p><b>Топы<br>
                                        Длина:</b> - 3 см (в сравнении со стандартным размером)<br>
                                    <b>Длина рукавов:</b> - 3 см (в сравнении со стандартным размером)
                                </p>
                                <p><br>
                                    <b>Рубашки<br>
                                    </b>Чтобы выбрать рубашку идеального размера, необходимо убедиться в том, что вам подходит
                                    размер ее воротника. Возьмите рубашку, которая хорошо сидит на вас, и измерьте длину ее
                                    воротника от середины пуговицы до края петли для пуговицы.<br>
                                    <br>
                                </p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>XS/S</th>
                                            <th colspan="2">S/S</th>
                                            <th colspan="2">M/S</th>
                                            <th colspan="2">L/S</th>
                                        </tr>
                                        <tr>
                                            <th>EUR см</th>
                                            <td>36</td>
                                            <td>37</td>
                                            <td>38</td>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>41</td>
                                            <td>42</td>
                                        </tr>
                                        <tr>
                                            <th>Рост см</th>
                                            <td>169</td>
                                            <td>170</td>
                                            <td>171</td>
                                            <td>172</td>
                                            <td>173</td>
                                            <td>174</td>
                                            <td>175</td>
                                        </tr>
                                        <tr>
                                            <th>Грудь см</th>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                            <td>100</td>
                                            <td>104</td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>72</td>
                                            <td>76</td>
                                            <td>80</td>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                        </tr>
                                        <tr>
                                            <th>Вырез горловины см</th>
                                            <td>35</td>
                                            <td>36</td>
                                            <td>37</td>
                                            <td>38</td>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>41</td>
                                        </tr>
                                        <tr>
                                            <th>Длина рукава см</th>
                                            <td>59</td>
                                            <td>59,5</td>
                                            <td>60</td>
                                            <td>60,5</td>
                                            <td>61</td>
                                            <td>61,5</td>
                                            <td>62</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p>&nbsp;</p>
                                <p><b>Топы, Куртки И Пиджаки<br>
                                        <br>
                                    </b></p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>XS/S</th>
                                            <th colspan="2">S/S</th>
                                            <th colspan="2">M/S</th>
                                            <th colspan="2">L/S</th>
                                        </tr>
                                        <tr>
                                            <th>EUR см</th>
                                            <td>42s</td>
                                            <td>44s</td>
                                            <td>46s</td>
                                            <td>48s</td>
                                            <td>50s</td>
                                            <td>52s</td>
                                            <td>54s</td>
                                        </tr>
                                        <tr>
                                            <th>Рост см</th>
                                            <td>169</td>
                                            <td>170</td>
                                            <td>171</td>
                                            <td>172</td>
                                            <td>173</td>
                                            <td>174</td>
                                            <td>175</td>
                                        </tr>
                                        <tr>
                                            <th>Грудь см</th>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                            <td>100</td>
                                            <td>104</td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>72</td>
                                            <td>76</td>
                                            <td>80</td>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                        </tr>
                                        <tr>
                                            <th>Вырез горловины см</th>
                                            <td>35</td>
                                            <td>36</td>
                                            <td>37</td>
                                            <td>38</td>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>41</td>
                                        </tr>
                                        <tr>
                                            <th>Длина рукава см</th>
                                            <td>59</td>
                                            <td>59,5</td>
                                            <td>60</td>
                                            <td>60,5</td>
                                            <td>61</td>
                                            <td>61,5</td>
                                            <td>62</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p>
                                    <br>
                                    <b>Брюки<br>
                                    </b>Длина штанины по внутреннему шву: - 4 см (в сравнении со стандартным размером)<br>
                                    <br>
                                </p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>XS/S</th>
                                            <th colspan="2">S/S</th>
                                            <th colspan="2">M/S</th>
                                            <th colspan="2">L/S</th>
                                        </tr>
                                        <tr>
                                            <th>EUR&nbsp;см</th>
                                            <td>42s</td>
                                            <td>44s</td>
                                            <td>46s</td>
                                            <td>48s</td>
                                            <td>50s</td>
                                            <td>52s</td>
                                            <td>54s</td>
                                        </tr>
                                        <tr>
                                            <th>Рост см</th>
                                            <td>169</td>
                                            <td>170</td>
                                            <td>171</td>
                                            <td>172</td>
                                            <td>173</td>
                                            <td>174</td>
                                            <td>175</td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>72</td>
                                            <td>76</td>
                                            <td>80</td>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                        </tr>
                                        <tr>
                                            <th>Бедра см</th>
                                            <td>90</td>
                                            <td>93</td>
                                            <td>96</td>
                                            <td>99</td>
                                            <td>102</td>
                                            <td>105</td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <th>Длина штанины по внутреннему шву см</th>
                                            <td>76,6</td>
                                            <td>77,2</td>
                                            <td>77,8</td>
                                            <td>78,4</td>
                                            <td>79</td>
                                            <td>79,6</td>
                                            <td>80,2</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">ВЫСОКИЙ РОСТ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <p><b>Топы</b><br>
                                    <b>Длина:</b> + 3 см (в сравнении со стандартным размером)<br>
                                    <b>Длина рукавов:</b> + 3 см (в сравнении со стандартным размером)<br>
                                </p>
                                <p><b>Рубашки<br>
                                    </b>Чтобы выбрать рубашку идеального размера, необходимо убедиться в том, что вам подходит
                                    размер ее воротника. Возьмите рубашку, которая хорошо сидит на вас, и измерьте длину ее
                                    воротника от середины пуговицы до края петли для пуговицы.<br>
                                    <br>
                                </p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th colspan="2">M/L</th>
                                            <th colspan="2">L/L</th>
                                        </tr>
                                        <tr>
                                            <th>EUR см</th>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>41</td>
                                            <td>42</td>
                                        </tr>
                                        <tr>
                                            <th>Рост см</th>
                                            <td>188</td>
                                            <td>189</td>
                                            <td>190</td>
                                            <td>191</td>
                                        </tr>
                                        <tr>
                                            <th>Грудь см</th>
                                            <td>96</td>
                                            <td>100</td>
                                            <td>104</td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                        </tr>
                                        <tr>
                                            <th>Вырез горловины см</th>
                                            <td>38</td>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>41</td>
                                        </tr>
                                        <tr>
                                            <th>Длина рукава см</th>
                                            <td>66,5</td>
                                            <td>67</td>
                                            <td>67,5</td>
                                            <td>68</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><b><br>
                                        Топы, Куртки И Пиджаки<br>
                                        <br>
                                    </b></p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th colspan="2">M/L</th>
                                            <th colspan="2">L/L</th>
                                        </tr>
                                        <tr>
                                            <th>EUR см</th>
                                            <td>48L</td>
                                            <td>50L</td>
                                            <td>52L</td>
                                            <td>54L</td>
                                        </tr>
                                        <tr>
                                            <th>Рост см</th>
                                            <td>188</td>
                                            <td>189</td>
                                            <td>190</td>
                                            <td>191</td>
                                        </tr>
                                        <tr>
                                            <th>Грудь см</th>
                                            <td>96</td>
                                            <td>100</td>
                                            <td>104</td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                        </tr>
                                        <tr>
                                            <th>Вырез горловины см</th>
                                            <td>38</td>
                                            <td>39</td>
                                            <td>40</td>
                                            <td>41</td>
                                        </tr>
                                        <tr>
                                            <th>Длина рукава см</th>
                                            <td>66.5</td>
                                            <td>67</td>
                                            <td>67.5</td>
                                            <td>68</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><br>
                                    <b>Брюки<br>
                                    </b>Длина штанины по внутреннему шву: + 4 см (в сравнении со стандартным размером)<br>
                                    <br>
                                </p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th colspan="2">M/L</th>
                                            <th colspan="2">L/L</th>
                                        </tr>
                                        <tr>
                                            <th>EUR см</th>
                                            <td>48L</td>
                                            <td>50L</td>
                                            <td>52L</td>
                                            <td>54L</td>
                                        </tr>
                                        <tr>
                                            <th>Рост см</th>
                                            <td>188</td>
                                            <td>189</td>
                                            <td>190</td>
                                            <td>191</td>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>84</td>
                                            <td>88</td>
                                            <td>92</td>
                                            <td>96</td>
                                        </tr>
                                        <tr>
                                            <th>Бедра см</th>
                                            <td>99</td>
                                            <td>102</td>
                                            <td>105</td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <th>Длина штанины по внутреннему шву см</th>
                                            <td>86.4</td>
                                            <td>87</td>
                                            <td>87.6</td>
                                            <td>88.2</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">НОСКИ И ОБУВЬ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <img src="./img/sidedrawer/2.jpg" alt="Размерное изображение" title="sizeguidefoot"
                                     class="aligncenter">
                                <p><b>Носки<br>
                                        <br>
                                    </b></p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>EUR</th>
                                            <th>37/39</th>
                                            <th>40/42</th>
                                            <th>43/45</th>
                                        </tr>
                                        <tr>
                                            <th>Длина стопы см</th>
                                            <td>23,6-25</td>
                                            <td>25,6-26,9</td>
                                            <td>27,6-29</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><b>Обувь<br>
                                        <br>
                                    </b></p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>EUR</th>
                                            <th>38</th>
                                            <th>39</th>
                                            <th>40</th>
                                            <th>41</th>
                                            <th>42</th>
                                            <th>43</th>
                                            <th>44</th>
                                            <th>45</th>
                                        </tr>
                                        <tr>
                                            <th>Длина стопы см</th>
                                            <td>24,3</td>
                                            <td>25</td>
                                            <td>25,6</td>
                                            <td>26,3</td>
                                            <td>26,9</td>
                                            <td>27,6</td>
                                            <td>28,3</td>
                                            <td>29</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">РЕМНИ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>XS</th>
                                            <th>S</th>
                                            <th>M</th>
                                            <th>L</th>
                                            <th>XL</th>
                                        </tr>
                                        <tr>
                                            <th>Талия см</th>
                                            <td>72</td>
                                            <td>80</td>
                                            <td>88</td>
                                            <td>96</td>
                                            <td>104</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">ПЕРЧАТКИ И ВАРЕЖКИ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <img src="./img/sidedrawer/3.jpg" alt="Размерное изображение" title="acc-hands100x162"
                                     class="aligncenter">
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>XS</th>
                                            <th>S</th>
                                            <th>M</th>
                                            <th>L</th>
                                            <th>XL</th>
                                        </tr>
                                        <tr>
                                            <th>ОБХВАТ ЛАДОНИ см)</th>
                                            <td>20,1</td>
                                            <td>20,9</td>
                                            <td>21,7</td>
                                            <td>22,5</td>
                                            <td>23,3</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">ШЛЯПЫ</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <img src="./img/sidedrawer/4.jpg" alt="Размерное изображение" title="acc-hats200x124"
                                     class="aligncenter">
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>S</th>
                                            <th>M</th>
                                            <th>L</th>
                                            <th>XL</th>
                                        </tr>
                                        <tr>
                                            <th>ОБХВАТ ГОЛОВЫ см</th>
                                            <td>56</td>
                                            <td>58</td>
                                            <td>60</td>
                                            <td>62</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">КОЛЬЦА</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>S</th>
                                            <th>M</th>
                                            <th>L</th>
                                        </tr>
                                        <tr>
                                            <th>Стандартный диаметр - кольцо мм EUR</th>
                                            <td>16</td>
                                            <td>18,5</td>
                                            <td>21</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="sizelisting__item">
                            <h3>
                                <button class="sizelisting__list-button">собаки</button>
                            </h3>
                            <div class="sizelisting__list-content">
                                <img src="./img/sidedrawer/5.png" alt="Размерное изображение" title="size-guide-dog-light-200"
                                     class="aligncenter">
                                <p>Мерки необходимо снимать непосредственно на теле собаки.</p>
                                <p><b>А:</b> длина спинки измеряется от основания шеи вашего животного (в месте, где должен
                                    располагаться воротник) до основания хвоста. Важно, чтобы во время измерения длины спинки ваше
                                    животное стояло в обычном положении.</p>
                                <p><b>Б:</b> для определения обхвата шеи необходимо измерить окружность шеи (в месте, где должен
                                    располагаться воротник). Как можно точнее снимите мерку, плотно прикладывая измерительную
                                    ленту вокруг шеи животного.</p>
                                <p><b>В:</b> обхват груди измеряется в самой широкой части груди животного, обычно за его
                                    передними лапами. Снимите мерку, плотно прикладывая измерительную ленту вокруг груди
                                    животного.<br>
                                    <br>
                                </p>
                                <div class="sizelisting__table-scrollable">
                                    <table class="sizelisting__table">
                                        <tbody>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>XS</th>
                                            <th>S</th>
                                            <th>M</th>
                                            <th>L</th>
                                        </tr>
                                        <tr>
                                            <th>EUR</th>
                                            <td>XS-25</td>
                                            <td>S-30</td>
                                            <td>M-40</td>
                                            <td>L-50</td>
                                        </tr>
                                        <tr>
                                            <th>Длина спинки см</th>
                                            <td>25</td>
                                            <td>30</td>
                                            <td>40</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <th>Обхват шеи см</th>
                                            <td>22-28</td>
                                            <td>27-33</td>
                                            <td>33-39</td>
                                            <td>39-45</td>
                                        </tr>
                                        <tr>
                                            <th>Обхват груди см</th>
                                            <td>31-41</td>
                                            <td>38-48</td>
                                            <td>49-58</td>
                                            <td>60-70</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </section>--}}

@endsection
