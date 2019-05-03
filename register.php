<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css?ver=1.1.3.4"/>
  <head>
    <meta charset="utf-8">
    <title>Register Page</title>
    <h1>Register Page</h1>
  </head>
  <body>
    <?php
    $Serial = $_GET["Serial"]

     ?>
    <form class="" action="./input.php" method="post">
      <select class="" name="Grade">
        <option>학년</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>

      <select class="" align="center" name="Class">
        <option>반</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
      </select>

      <select class="" name="Number">
        <option>번호</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
        <option>21</option>
        <option>22</option>
        <option>23</option>
        <option>24</option>
        <option>25</option>
        <option>26</option>
        <option>27</option>
        <option>28</option>
        <option>29</option>
        <option>30</option>
        <option>31</option>
        <option>32</option>
        <option>33</option>
        <option>34</option>
        <option>35</option>
        <option>36</option>
        <option>37</option>
        <option>38</option>
        <option>39</option>
        <option>40</option>
      </select>
      <input type="text" name="Name" value="" placeholder="이름"> <br>
      <button type="submit" name="button">확인</button>
      <input type="hidden" name="Serial" value="<?=$Serial?>">
    </form>

    </form>
  </body>
</html>
