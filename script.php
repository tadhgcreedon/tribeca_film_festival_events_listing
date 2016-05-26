<?php
// Solution to Problem 1
  $url1 = "http://xomo.ca/x_testing/codeTestPage1.json";
  $url2 = "http://xomo.ca/x_testing/codeTestPage2.json";
  $url3 = "http://xomo.ca/x_testing/codeTestPage3.json";
  $url4 = "http://xomo.ca/x_testing/codeTestPage4.json";

  $file1 = json_decode(file_get_contents($url1), true);
  $file2 = json_decode(file_get_contents($url1), true);
  $file3 = json_decode(file_get_contents($url1), true);
  $file4 = json_decode(file_get_contents($url1), true);

  $filesArray = array(0 => $file1, 1 => $file2, 2 => $file3, 3 => $file4);
  $eventsArray = array();

// Solution to Problem 2
  for($i = 0; $i < 4; $i++) {
    $j = 0;
    // Check that data is not invalid
    if($filesArray[$i] !== NULL) {
      foreach($filesArray[$i]["events"] as $event) {
        $thisEvent = array();
        $thisEvent["id"] = (int)$event["id"];
        $thisEvent["name"] = $event["name"]["text"];
        $thisEvent["url"] = $event["url"];

        $capacity = $sold = 0;

        foreach($event["ticket_classes"] as $ticket_class) {
          $capacity += $ticket_class["quantity_total"];
          $sold += $ticket_class["quantity_sold"];
        }

        $thisEvent["capacity"] = $capacity;
        $thisEvent["sold"] = $sold;

        $type = $capacity - $sold;
        $ticket_type = "";

        if($type === 0) {
          $ticket_type = "SOLD OUT";
        }
        else if ($type > 10) {
          $ticket_type = "BUY";
        }
        else if ($type < 10) {
          $ticket_type = "RUSH";
        }
        else {
          $ticket_type = "ERROR";
        }

        $thisEvent["ticket_type"] = $ticket_type;
        $eventsArray[$i][$j] = $thisEvent;
        $j++;
      }
    }
  }
  // Solution to problem 3
  $export = fopen("JSON/codeComplete.json", "w") or die("Error creating file.");
  fwrite($export, json_encode($eventsArray));
  fclose($export);
?>
