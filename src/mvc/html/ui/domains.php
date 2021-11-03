<bbn-table :scrollable="true"
           :source="root + 'data/domains'"
           :filterable="true"
           :server-filtering="false"
           :pageable="true"
           :server-paging="false">
  <bbns-column field="name"
               :title="_('Name')"/>
  <bbns-column field="features"
               :title="_('Features')"/>
  <bbns-column field="ip_address"
               :title="_('IP Address')"/>
  <bbns-column field="ssl_cert_file"
               :title="_('SSL Certificate')"/>
  <bbns-column field="ssl_key_file"
               :title="_('SSL Key Certificate')"/>
  <bbns-column field="lets_encrypt_renewal"
               :title="_('Let\'s Encrypt Renewal')"/>
  <bbns-column field="php_max_execution_time"
               :title="_('PHP Max Execution Time')"/>
  <bbns-column field="contact_address"
               :title="_('Contact Address')"/>
</bbn-table>