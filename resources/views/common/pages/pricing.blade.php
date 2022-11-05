@extends("layouts.common")
@section("content")
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>Pricing</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">

                <div class="row">

                    <div class="col-lg col-xl">

                        <table class="table table-striped pricing_table">
                            <tbody>
                            <tr>
                                <th>SIZE</th>
                                <th>GLOSSY/SATIN</th>
                                <th>FOAM BOARD</th>
                                <th>VINYL</th>
                                <th>ADHESIVE</th>
                            </tr>
                            @foreach($result as $res)
                                <tr class="odd_row">
                                    <td>{{$res->title}}</td>
                                    <td>${{$res->photo_premium_glossy}}</td>
                                    <td>${{$res->canvas}}</td>
                                    <td>${{$res->banner}}</td>
                                    <td>${{$res->self_adhesive}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="col-5">

                        <div class="card panel_quote">
                            <div class="card-header">QUICK QUOTE</div>
                            <div class="card-body">

                                <form>

                                    <div class="form-group form-group-sm">
                                        <label for="qq_media">1. Choose Your Media</label>
                                        <select class="form-control" name="qq_media" id="qq_media"
                                                onchange="quickquote();">
                                            <option value="gloss" selected="selected">Photo Paper</option>
                                            <option value="foamcore">Foam Core Board</option>
                                            <option value="vinyl">Banner-Vinyl</option>
                                            <option value="canvas">Canvas</option>
                                            <option value="adhesive">Self Adhesive Synthetic</option>
                                        </select>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label for="qq_width">2. Choose Size (inches)</label>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <select name="qq_width" id="qq_width" class="form-control"
                                                        onchange="quickquote('w');">
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option selected="selected" value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                    <option value="60">60</option>
                                                    <option value="61">61</option>
                                                    <option value="62">62</option>
                                                    <option value="63">63</option>
                                                    <option value="64">64</option>
                                                    <option value="65">65</option>
                                                    <option value="66">66</option>
                                                    <option value="67">67</option>
                                                    <option value="68">68</option>
                                                    <option value="69">69</option>
                                                    <option value="70">70</option>
                                                    <option value="71">71</option>
                                                    <option value="72">72</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                x
                                            </div>
                                            <div class="col-md-5">
                                                <select name="qq_height" id="qq_height" class="form-control"
                                                        onchange="quickquote('h');">
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option selected="selected" value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                    <option value="60">60</option>
                                                    <option value="61">61</option>
                                                    <option value="62">62</option>
                                                    <option value="63">63</option>
                                                    <option value="64">64</option>
                                                    <option value="65">65</option>
                                                    <option value="66">66</option>
                                                    <option value="67">67</option>
                                                    <option value="68">68</option>
                                                    <option value="69">69</option>
                                                    <option value="70">70</option>
                                                    <option value="71">71</option>
                                                    <option value="72">72</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label for="qq_framing">3. Framing Options</label>
                                        <select class="form-control" name="qq_framing" id="qq_framing"
                                                onchange="quickquote();">
                                            <option value="none">No Framing</option>
                                        </select>
                                    </div>

                                    <p class="bg-success">TOTAL PRICE: <span id="qq_price">$10.48</span></p>

                                    <p class="text-center hidden" id="qq_discount"></p>

                                    <p class="text-center">Get Started</p>

                                    <p class="text-center">
                                        <a href="/start-journey" class="btn btn-danger">CREATE YOUR POSTER</a>
                                    </p>

                                </form>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
