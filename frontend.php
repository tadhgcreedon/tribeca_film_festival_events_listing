<?php // Solution to Problem 4 ?>

<div id="container">
  <header>
    <h1>
      <a href="https://tribecafilm.com/festival/">
        <img src="https://tribecafilm.com/assets/logo-tff-compressed.svg"></img>
      </a>
      <br>
      <a href="">Events Listing</a>
  </h1>
  </header>

  <section id="content">
    <table>
      <tr class="tableHeaderRow">
        <th>
          <strong>Event</strong>
        </th>
        <th>
          <strong>Ticket Availability</strong>
        </th>
      </tr>
      <?php
        if(!empty($eventsArray))
         foreach($eventsArray as $eventsCollection) {
           foreach ($eventsCollection as $event) {
             echo "<tr>";
             echo "<td><a target='_blank' href='" . $event["url"] . "'><strong>" . $event["name"] .
              "</strong></a></td>";
             if($event["ticket_type"] === "BUY") {
               echo "<td class='ticketAvailibityInfo'>Available</td>";
             }
             else if($event["ticket_type"] === "RUSH"){
               echo "<td class='ticketAvailibityInfo'>Almost sold out!</td>";
             }
             else if($event["ticket_type"] === "SOLD OUT") {
               echo "<td class='ticketAvailibityInfo'>Sold out</td>";
             }
             else {
               echo "<td class='ticketAvailibityInfo'>Ticket information unavailable</td>";
             }

             echo "</tr>";
           }
         }
        else {
          echo "<p>Event information unavailable.</p>";
        }
       ?>
    </table>
  </section>
</div>
