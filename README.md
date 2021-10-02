# SE2A5 | Semestre n°9 - TP systèmes & réseaux

## Configuration des équipements réseau

### Configuration de base

#### Cisco Catalyst 6509-E

```
switch>enable
switch#configure terminal
```
* Configuration du nom d’hôte
```
switch(config)#hostname SE2A5-R1
```
* Accès SSH
```
SE2A5-R1(config)#aaa new-model
SE2A5-R1(config)#username admin privilege 15 secret glopglop
SE2A5-R1(config)#ip domain-name plil.info
SE2A5-R1(config)#crypto key generate rsa
SE2A5-R1(config)#line vty 0 15
SE2A5-R1(config-line)#transport input ssh
SE2A5-R1(config-line)#exit
```
* Accès console
```
SE2A5-R1(config)#line console 0
SE2A5-R1(config-line)#password glopglop
SE2A5-R1(config-line)#login authentification AAA_CONSOLE
SE2A5-R1(config-line)#exit
```
* Sécurisation des accès
```
SE2A5-R1(config)#service password-encryption
SE2A5-R1(config)#enable secret glopglop
SE2A5-R1(config)#banner motd #Restricted Access#
```
* Activer le routage
```
SE2A5-R1(config)#ip routing
SE2A5-R1(config)#ipv6 unicast-routing
```
* Activer VRRP
```
SE2A5-R1(config)#license boot level network-advantage
SE2A5-R1(config)#fhrp version vrrp v3
```

#### Cisco Catalyst 9200

```
switch>enable
switch#configure terminal
```
* Configuration du nom d’hôte
```
switch(config)#hostname SE2A5-R2
```
* Accès SSH
```
SE2A5-R2(config)#aaa new-model
SE2A5-R2(config)#username admin privilege 15 secret glopglop
SE2A5-R2(config)#ip domain-name plil.info
SE2A5-R2(config)#crypto key generate rsa
SE2A5-R2(config)#line vty 0 15
SE2A5-R2(config-line)#transport input ssh
SE2A5-R2(config-line)#exit
```
* Accès console
```
SE2A5-R2(config)#line console 0
SE2A5-R2(config-line)#password glopglop
SE2A5-R2(config-line)#login authentification AAA_CONSOLE
SE2A5-R2(config-line)#exit
```
* Sécurisation des accès
```
SE2A5-R2(config)#service password-encryption
SE2A5-R2(config)#enable secret glopglop
SE2A5-R2(config)#banner motd #Restricted Access#
```
* Activer le routage
```
SE2A5-R2(config)#ip routing
SE2A5-R2(config)#ipv6 unicast-routing
```
* Activer VRRP
```
SE2A5-R2(config)#license boot level network-advantage
SE2A5-R2(config)#fhrp version vrrp v3
```

### Configuration du VLAN 530

#### Cisco Catalyst 6509-E

* VLAN 530
```
SE2A5-R1(config)#vlan 530
SE2A5-R1(config-vlan)#name INTERCO-4A
SE2A5-R1(config-vlan)#exit
SE2A5-R1(config)#interface vlan 530
SE2A5-R1(config-if)#description INTERCO-4A
SE2A5-R1(config-if)#ip address 192.168.222.34 255.255.255.248
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#exit
```
* Interface d’interconnexion
```
SE2A5-R1(config)#interface t6/5
SE2A5-R1(config-if)#switchport
SE2A5-R1(config-if)#switchport mode access
SE2A5-R1(config-if)#switchport access vlan 530
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#exit
```

#### Cisco Catalyst 9200

* VLAN 530
```
SE2A5-R2(config)#vlan 530
SE2A5-R2(config-vlan)#name INTERCO-4A
SE2A5-R2(config-vlan)#exit
SE2A5-R2(config)#interface vlan 530
SE2A5-R2(config-if)#description INTERCO-4A
SE2A5-R2(config-if)#ip address 192.168.222.35 255.255.255.248
SE2A5-R2(config-if)#no shutdown
SE2A5-R2(config-if)#exit
```
* Interface d’interconnexion
```
SE2A5-R2(config)#interface g1/0/1
SE2A5-R2(config-if)#switchport
SE2A5-R2(config-if)#switchport mode access
SE2A5-R2(config-if)#switchport access vlan 530
SE2A5-R2(config-if)#no shutdown
SE2A5-R2(config-if)#exit
```

### Configuration du VLAN 110

#### Cisco Catalyst 6509-E

* VLAN 110
```
SE2A5-R1(config)#vlan 110
SE2A5-R1(config-vlan)#name TP-NET1
SE2A5-R1(config-vlan)#exit
SE2A5-R1(config)#interface vlan 110
SE2A5-R1(config-if)#description TP-NET1
SE2A5-R1(config-if)#ip address 10.60.100.1 255.255.255.0
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#exit
```
* Interface vers serveur Capbreton
```
SE2A5-R1(config)#interface t6/4
SE2A5-R1(config-if)#switchport
SE2A5-R1(config-if)#switchport mode access
SE2A5-R1(config-if)#switchport access vlan 110
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#exit
```

#### Cisco Catalyst 9200

* VLAN 110
```
SE2A5-R2(config)#vlan 110
SE2A5-R2(config-vlan)#name TP-NET1
SE2A5-R2(config-vlan)#exit
SE2A5-R2(config)#interface vlan 110
SE2A5-R2(config-if)#description TP-NET1
SE2A5-R2(config-if)#ip address 10.60.100.2 255.255.255.0
SE2A5-R2(config-if)#no shutdown
SE2A5-R2(config-if)#exit
```
* Interface vers serveur Capbreton
```
SE2A5-R2(config)#interface t1/1/1
SE2A5-R2(config-if)#switchport
SE2A5-R2(config-if)#switchport mode access
SE2A5-R2(config-if)#switchport access vlan 110
SE2A5-R2(config-if)#no shutdown
SE2A5-R2(config-if)#exit
```

### Paramétrage du routage IPv4 OSPF

#### Cisco Catalyst 6509-E

* Routage IPv4 - Protocole OPSF
```
SE2A5-R1(config)#router ospf 1
SE2A5-R1(config-router)#router-id 192.168.222.34
SE2A5-R1(config-router)#summary-address 193.48.57.160 255.255.255.240
SE2A5-R1(config-router)#summary-address 10.0.0.0 255.0.0.0 not-advertise
SE2A5-R1(config-router)#redistribute connected subnets
SE2A5-R1(config-router)#redistribute static subnets
SE2A5-R1(config-router)#network 192.168.222.32 0.0.0.7 area 10
SE2A5-R1(config-router)#network 192.168.222.48 0.0.0.7 area 20
SE2A5-R1(config-router)#default-information originate
SE2A5-R1(config-router)#exit
```

#### Cisco Catalyst 9200

* Routage IPv4 - Protocole OPSF
```
SE2A5-R2(config)#router ospf 1
SE2A5-R2(config-router)#router-id 192.168.222.34
SE2A5-R2(config-router)#summary-address 193.48.57.160 255.255.255.240
SE2A5-R2(config-router)#summary-address 10.0.0.0 255.0.0.0 not-advertise
SE2A5-R2(config-router)#redistribute connected subnets
SE2A5-R2(config-router)#redistribute static subnets
SE2A5-R2(config-router)#network 192.168.222.32 0.0.0.7 area 10
SE2A5-R2(config-router)#network 192.168.222.48 0.0.0.7 area 20
SE2A5-R2(config-router)#default-information originate
SE2A5-R2(config-router)#exit
```

### Redondance des routeurs via le protocole VRRP

#### Cisco Catalyst 6509-E

* VLAN 110
```
SE2A5-R1(config)#interface vlan 110
SE2A5-R1(config-if)#vrrp 10 ip 10.60.100.254
SE2A5-R1(config-if)#vrrp 10 preempt
SE2A5-R1(config-if)#vrrp 10 priority 110
SE2A5-R1(config-if)#exit
```

#### Cisco Catalyst 9200

* VLAN 110
```
SE2A5-R2(config)#interface vlan 110
SE2A5-R2(config-if)#vrrp 10 address-family ipv4
SE2A5-R2(config-if-vrrp)#address 10.60.100.254
SE2A5-R2(config-if-vrrp)#priority 100
SE2A5-R2(config-if-vrrp)#preempt
SE2A5-R2(config-if-vrrp)#exit
SE2A5-R2(config-if)#exit
```

### Translation NAT statique

#### Cisco Catalyst 6509-E

* Configuration NAT
```
SE2A5-R1(config)#interface vlan 530
SE2A5-R1(config-if)#ip nat outside
SE2A5-R1(config-if)#exit
SE2A5-R1(config)#interface vlan 110
SE2A5-R1(config-if)#ip nat inside
SE2A5-R1(config-if)#exit
SE2A5-R1(config)#ip nat inside source static network 10.60.100.160 193.48.57.160 /28
```
* Redistribution via OSPF à partir de l'interface Loopback 0
```
SE2A5-R1(config)#interface loopback 0
SE2A5-R1(config-if)#ip address 193.48.57.174 255.255.255.240
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#exit
```

La solution avec NAT ne permet pas de router les paquets pour les connexions TCP.
Les VM doient en effet avoir une configuration IP sur le réseau 193.48.57.160/28.

La solution avec les routes statiques demande que les VM aient une configuration IP sur le réseau 10.60.100.160/28.

En attente d'une solution de contournement.
Ou ajouter les routes statiques comme pour le Cisco Catalyst 9200.

#### Cisco Catalyst 9200

* Configuration NAT
```
SE2A5-R2(config)#interface vlan 530
SE2A5-R2(config-if)#ip nat outside
SE2A5-R2(config-if)#exit
SE2A5-R2(config)#interface vlan 110
SE2A5-R2(config-if)#ip nat inside
SE2A5-R2(config-if)#exit
SE2A5-R2(config)#ip nat inside source static network 10.60.100.160 193.48.57.160 /28
```

Comme le Cisco Catalyst 9200 ne prend pas en charge NAT, nous passons par des routes statiques.

```
SE2A5-R2(config)#ip route 193.48.57.161 255.255.255.255 10.60.100.161
SE2A5-R2(config)#ip route 193.48.57.162 255.255.255.255 10.60.100.162
SE2A5-R2(config)#ip route 193.48.57.163 255.255.255.255 10.60.100.163
SE2A5-R2(config)#ip route 193.48.57.164 255.255.255.255 10.60.100.164
SE2A5-R2(config)#ip route 193.48.57.165 255.255.255.255 10.60.100.165
SE2A5-R2(config)#ip route 193.48.57.166 255.255.255.255 10.60.100.166
SE2A5-R2(config)#ip route 193.48.57.167 255.255.255.255 10.60.100.167
SE2A5-R2(config)#ip route 193.48.57.168 255.255.255.255 10.60.100.168
SE2A5-R2(config)#ip route 193.48.57.169 255.255.255.255 10.60.100.169
SE2A5-R2(config)#ip route 193.48.57.170 255.255.255.255 10.60.100.170
SE2A5-R2(config)#ip route 193.48.57.171 255.255.255.255 10.60.100.171
SE2A5-R2(config)#ip route 193.48.57.172 255.255.255.255 10.60.100.172
SE2A5-R2(config)#ip route 193.48.57.173 255.255.255.255 10.60.100.173
```

### Configuration de l'accès Internet de secours

#### Cisco Catalyst 6509-E

* Interface vers Cisco ISR 4331
```
SE2A5-R1(config)#interface t5/5
SE2A5-R1(config-if)#switchport
SE2A5-R1(config-if)#switchport trunk encapsulation dot1q
SE2A5-R1(config-if)#switchport mode trunk
SE2A5-R1(config-if)#switchport trunk allowed vlan 110
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#exit
```
* SLA
```
SE2A5-R1(config)#ip sla 1
SE2A5-R1(config-ip-sla)#icmp-echo 192.168.44.1
SE2A5-R1(config-ip-sla-echo)#frequency 300
SE2A5-R1(config-ip-sla-echo)#exit
SE2A5-R1(config)#ip sla schedule 1 life forever start-time now
SE2A5-R1(config)#track 1 ip sla 1
SE2A5-R1(config-track)#exit
SE2A5-R1(config)#interface vlan 110
SE2A5-R1(config-if)#vrrp 10 track 1 decrement 50
SE2A5-R1(config-if)#exit
```

#### Cisco Catalyst 9200

* Interface vers Cisco ISR 4331
```
SE2A5-R2(config)#interface g1/0/2
SE2A5-R2(config-if)#switchport
SE2A5-R2(config-if)#switchport trunk encapsulation dot1q
SE2A5-R2(config-if)#switchport mode trunk
SE2A5-R2(config-if)#switchport trunk allowed vlan 110
SE2A5-R2(config-if)#no shutdown
SE2A5-R2(config-if)#exit
```
* SLA
```
SE2A5-R2(config)#ip sla 1
SE2A5-R2(config-ip-sla)#icmp-echo 192.168.44.1
SE2A5-R2(config-ip-sla-echo)#frequency 300
SE2A5-R2(config-ip-sla-echo)#exit
SE2A5-R2(config)#ip sla schedule 1 life forever start-time now
SE2A5-R2(config)#track 1 ip sla 1
SE2A5-R2(config-track)#exit
SE2A5-R2(config)#interface vlan 110
SE2A5-R2(config-if)#vrrp 10 address-family ipv4
SE2A5-R2(config-if-vrrp)#track 1 decrement 50
SE2A5-R2(config-if-vrrp)#exit
SE2A5-R2(config-if)#exit
```

#### Cisco ISR 4331

##### Configuration de base

```
switch>enable
switch#configure terminal
```
* Configuration du nom d’hôte
```
switch(config)#hostname SE2A5-R3
```
* Accès SSH
```
SE2A5-R3(config)#aaa new-model
SE2A5-R3(config)#username admin privilege 15 secret glopglop
SE2A5-R3(config)#ip domain-name plil.info
SE2A5-R3(config)#crypto key generate rsa
SE2A5-R3(config)#line vty 0 15
SE2A5-R3(config-line)#transport input ssh
SE2A5-R3(config-line)#exit
```
* Accès console
```
SE2A5-R3(config)#line console 0
SE2A5-R3(config-line)#password glopglop
SE2A5-R3(config-line)#login authentification AAA_CONSOLE
SE2A5-R3(config-line)#exit
```
* Sécurisation des accès
```
SE2A5-R3(config)#service password-encryption
SE2A5-R3(config)#enable secret glopglop
SE2A5-R3(config)#banner motd #Restricted Access#
```
* Activer le routage
```
SE2A5-R3(config)#ip routing
SE2A5-R3(config)#ipv6 unicast-routing
```
* Activer VRRP
```
SE2A5-R3(config)#license boot level network-advantage
SE2A5-R3(config)#fhrp version vrrp v3
```

##### Pont vers le VLAN 532

* Bridge VLAN 532
```
SE2A5-R3(config)#interface bdi 532
SE2A5-R3(config-if)#ip address 192.168.222.50 255.255.255.248
SE2A5-R3(config-if)#no shutdown
SE2A5-R3(config-if)#exit
```
* Interface d’interconnexion
```
SE2A5-R3(config)#interface g0/0/0
SE2A5-R3(config-if)#description INTERCO-1B
SE2A5-R3(config-if)#no shutdown
SE2A5-R3(config-if)#service instance 532 ethernet
SE2A5-R3(config-if-srv)#encapsulation untagged
SE2A5-R3(config-if-srv)#bridge-domain 532
SE2A5-R3(config-if-srv)#exit
SE2A5-R3(config-if)#exit
```

##### Pont vers le VLAN 110

*  Bridge VLAN 110
```
SE2A5-R3(config)#interface bdi 110
SE2A5-R3(config-if)#ip address 10.60.100.3 255.255.255.0
SE2A5-R3(config-if)#vrrp 10 ip 10.60.100.254
SE2A5-R3(config-if)#vrrp 10 preempt
SE2A5-R3(config-if)#vrrp 10 priority 90
SE2A5-R3(config-if)#no shutdown
SE2A5-R3(config-if)#exit
```
* Interface vers Cisco Catalyst 6509-E
```
SE2A5-R3(config)#interface g0/0/3
SE2A5-R3(config-if)#description TP-NET1
SE2A5-R3(config-if)#no shutdown
SE2A5-R3(config-if)#service instance 110 ethernet
SE2A5-R3(config-if-srv)#encapsulation dot1q 110
SE2A5-R3(config-if-srv)#rewrite ingress tag pop 1 symmetric
SE2A5-R3(config-if-srv)#bridge-domain 110
SE2A5-R3(config-if-srv)#exit
SE2A5-R3(config-if)#exit
```
* Interface vers Cisco Catalyst 9200
```
SE2A5-R3(config)#interface g0/0/1
SE2A5-R3(config-if)#description TP-NET1
SE2A5-R3(config-if)#no shutdown
SE2A5-R3(config-if)#service instance 110 ethernet
SE2A5-R3(config-if-srv)#encapsulation dot1q 110
SE2A5-R3(config-if-srv)#rewrite ingress tag pop 1 symmetric
SE2A5-R3(config-if-srv)#bridge-domain 110
SE2A5-R3(config-if-srv)#exit
SE2A5-R3(config-if)#exit
```

##### Translation NAT dynamique

* Configuration NAT
```
SE2A5-R3(config)#interface vlan 532
SE2A5-R3(config-if)#ip nat outside
SE2A5-R3(config-if)#exit
SE2A5-R3(config)#interface vlan 110
SE2A5-R3(config-if)#ip nat inside
SE2A5-R3(config-if)#exit
SE2A5-R3(config)#access-list 10 permit 193.48.57.160 0.0.0.15
SE2A5-R3(config)#ip nat pool NAT_POOL 213.215.6.101 213.215.6.101 netmask 255.255.255.255
SE2A5-R3(config)#ip nat inside source list 10 pool NAT_POOL overload
SE2A5-R3(config)#ip nat inside source static network 10.60.100.160 193.48.57.160 /28
```

### Paramétrage IPv6

#### Cisco Catalyst 6509-E

* Routage IPv6 - Protocole RIPv6
```
SE2A5-R1(config)#ipv6 router rip tpima2a5
SE2A5-R1(config-router)#redistribute connected metric 1
SE2A5-R1(config-router)#redistribute rip 1 metric 1
SE2A5-R1(config-router)#redistribute static metric 1
SE2A5-R1(config-router)#exit
```
* VLAN 530
```
SE2A5-R1(config)#interface vlan 530
SE2A5-R1(config-if)#ipv6 address fe80::2 link-local
SE2A5-R1(config-if)#ipv6 rip tpima2a5 enable
SE2A5-R1(config-if)#ipv6 enable
```
* VLAN 110
```
SE2A5-R1(config)#interface vlan 110
SE2A5-R1(config-if)#ipv6 address 2001:660:4401:60a0::/64 eui-64
SE2A5-R1(config-if)#ipv6 nd prefix 2001:660:4401:60a0::/64 1000 900
SE2A5-R1(config-if)#ipv6 nd router-preference high
SE2A5-R1(config-if)#ipv6 enable
SE2A5-R1(config-if)#exit
```

#### Cisco Catalyst 9200

* Routage IPv6 - Protocole RIPv6
```
SE2A5-R2(config)#ipv6 router rip tpima2a5
SE2A5-R2(config-router)#redistribute connected metric 2
SE2A5-R2(config-router)#redistribute rip 1 metric 2
SE2A5-R2(config-router)#redistribute static metric 2
SE2A5-R2(config-router)#exit
```
* VLAN 530
```
SE2A5-R2(config)#interface vlan 530
SE2A5-R2(config-if)#ipv6 address fe80::3 link-local
SE2A5-R2(config-if)#ipv6 rip tpima2a5 enable
SE2A5-R2(config-if)#ipv6 enable
```
* VLAN 110
```
SE2A5-R2(config)#interface vlan 110
SE2A5-R2(config-if)#ipv6 address 2001:660:4401:60a0::/64 eui-64
SE2A5-R2(config-if)#ipv6 nd prefix 2001:660:4401:60a0::/64 1000 900
SE2A5-R2(config-if)#ipv6 nd router-preference high
SE2A5-R2(config-if)#ipv6 enable
SE2A5-R2(config-if)#exit
```

#### Cisco ISR 4331

* Bridge VLAN 532
```
SE2A5-R3(config)#interface bdi 532
SE2A5-R3(config-if)#ipv6 enable
SE2A5-R3(config-if)#exit
```
*  Bridge VLAN 110
```
SE2A5-R3(config)#interface bdi 110
SE2A5-R3(config-if)#ipv6 enable
SE2A5-R3(config-if)#exit
```

### Configuration du VLAN 164

#### Cisco Catalyst 6509-E

* VLAN 164
```
SE2A5-R1(config)#vlan 164
SE2A5-R1(config-vlan)#name DEMINEUR
SE2A5-R1(config-vlan)#exit
SE2A5-R1(config)#interface vlan 164
SE2A5-R1(config-if)#description DEMINEUR
SE2A5-R1(config-if)#ip address 10.60.164.1 255.255.255.0
SE2A5-R1(config-if)#ipv6 address 2001:660:4401:60a4::/64 eui-64
SE2A5-R1(config-if)#ipv6 nd prefix 2001:660:4401:60a4::/64 1000 900
SE2A5-R1(config-if)#ipv6 nd router-preference high
SE2A5-R1(config-if)#ipv6 enable
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#vrrp 64 ip 10.60.164.254
SE2A5-R1(config-if)#vrrp 64 preempt
SE2A5-R1(config-if)#vrrp 64 priority 110
SE2A5-R1(config-if)#vrrp 64 track 1 decrement 50
SE2A5-R1(config-if)#exit
SE2A5-R1(config)#interface t5/4
SE2A5-R1(config-if)#switchport trunk allowed vlan add 164
SE2A5-R1(config-if)#exit
SE2A5-R1(config)#interface g3/1
SE2A5-R1(config-if)#switchport trunk allowed vlan add 164
SE2A5-R1(config-if)#exit
```

#### Cisco Catalyst 9200

* VLAN 164
```
SE2A5-R2(config)#vlan 164
SE2A5-R2(config-vlan)#name DEMINEUR
SE2A5-R2(config-vlan)#exit
SE2A5-R2(config)#interface vlan 164
SE2A5-R2(config-if)#description DEMINEUR
SE2A5-R2(config-if)#ip address 10.60.164.2 255.255.255.0
SE2A5-R2(config-if)#ipv6 address 2001:660:4401:60a4::/64 eui-64
SE2A5-R2(config-if)#ipv6 nd prefix 2001:660:4401:60a4::/64 1000 900
SE2A5-R2(config-if)#ipv6 nd router-preference high
SE2A5-R2(config-if)#ipv6 enable
SE2A5-R2(config-if)#no shutdown
SE2A5-R2(config-if)#vrrp 64 address-family ipv4
SE2A5-R2(config-if-vrrp)#address 10.60.164.254
SE2A5-R2(config-if-vrrp)#priority 100
SE2A5-R2(config-if-vrrp)#preempt
SE2A5-R2(config-if-vrrp)#exit
SE2A5-R2(config-if)#exit
SE2A5-R2(config)#interface t1/1/2
SE2A5-R2(config-if)#switchport trunk allowed vlan add 164
SE2A5-R2(config-if)#exit
SE2A5-R2(config)#interface g1/0/3
SE2A5-R2(config-if)#switchport trunk allowed vlan add 164
SE2A5-R2(config-if)#exit
```

### Configuration du Wifi

#### Configuration des routeurs

##### Cisco Catalyst 6509-E

* DHCP
```
 SE2A5-R1(config)#ip dhcp pool DEMINEUR
 SE2A5-R1(dhcp-config)#dns 193.48.57.164
 SE2A5-R1(dhcp-config)#network 10.60.164.0 255.255.255.0
 SE2A5-R1(dhcp-config)#default-router 10.60.164.254
 SE2A5-R1(dhcp-config)#exit
 SE2A5-R1(config)#ip dhcp excluded-address 10.60.114.0 10.60.114.99
 SE2A5-R1(config)#ip dhcp excluded-address 10.60.114.150 10.60.114.255
```
* Interface vers le point d'accès Wifi
```
SE2A5-R1(config)#interface t5/4
SE2A5-R1(config-if)#switchport
SE2A5-R1(config-if)#switchport trunk encapsulation dot1q
SE2A5-R1(config-if)#switchport mode trunk
SE2A5-R1(config-if)#no shutdown
SE2A5-R1(config-if)#exit
```

##### Cisco Catalyst 9200

* DHCP
```
SE2A5-R2(config)#ip dhcp pool DEMINEUR
SE2A5-R2(dhcp-config)#dns 193.48.57.164
SE2A5-R2(dhcp-config)#network 10.60.164.0 255.255.255.0
SE2A5-R2(dhcp-config)#default-router 10.60.164.254
SE2A5-R2(dhcp-config)#exit
SE2A5-R2(config)#ip dhcp excluded-address 10.60.114.0 10.60.114.149
SE2A5-R2(config)#ip dhcp excluded-address 10.60.114.200 10.60.114.255
```
* Interface vers le point d'accès Wifi
```
SE2A5-R2(config)#interface g1/0/2
SE2A5-R2(config-if)#switchport
SE2A5-R2(config-if)#switchport trunk encapsulation dot1q
SE2A5-R2(config-if)#switchport mode trunk
SE2A5-R2(config-if)#no shutdown
SE2A5-R2(config-if)#exit
```

#### Point d'accès Wifi n°1

##### Configuration de base

```
ap>enable
ap#configure terminal
```
* Configuration du nom d’hôte
```
ap(config)#hostname SE2A5-AP1
```
* Accès SSH
```
SE2A5-AP1(config)#aaa new-model
SE2A5-AP1(config)#username admin privilege 15 secret glopglop
SE2A5-AP1(config)#ip domain-name plil.info
SE2A5-AP1(config)#crypto key generate rsa general-keys modulus 2048
SE2A5-AP1(config)#ip ssh version 2
SE2A5-AP1(config)#line vty 0 15
SE2A5-AP1(config-line)#transport input ssh
SE2A5-AP1(config-line)#exit
```
* Accès console
```
SE2A5-AP1(config)#line console 0
SE2A5-AP1(config-line)#password glopglop
SE2A5-AP1(config-line)#login authentification AAA_CONSOLE
SE2A5-AP1(config-line)#exit
```
* Sécurisation des accès
```
SE2A5-AP1(config)#service password-encryption
SE2A5-AP1(config)#enable secret glopglop
SE2A5-AP1(config)#banner motd #Restricted Access#
```

##### VLAN 164

* VLAN 164
```
SE2A5-AP1(config)#aaa authentication login EAP_DEMINEUR group RADIUS_DEMINEUR
SE2A5-AP1(config)#radius-server host 193.48.57.164 auth-port 1812 acct-port 1813 key glopglop
SE2A5-AP1(config)#aaa group server radius RADIUS_DEMINEUR
SE2A5-AP1(config-server)#server 193.48.57.164 auth-port 1812 acct-port 1813
SE2A5-AP1(config-server)#exit
SE2A5-AP1(config)#dot11 ssid DEMINEUR1
SE2A5-AP1(config-ssid)#mbssid guest-mode
SE2A5-AP1(config-ssid)#vlan 164
SE2A5-AP1(config-ssid)#authentication open eap EAP_DEMINEUR
SE2A5-AP1(config-ssid)#authentication network-eap EAP_DEMINEUR
SE2A5-AP1(config-ssid)#authentication key-management wpa
SE2A5-AP1(config-ssid)#exit
SE2A5-AP1(config)#interface dot11radio0.164
SE2A5-AP1(config-subif)#encapsulation dot1q 164
SE2A5-AP1(config-subif)#bridge-group 64
SE2A5-AP1(config-subif)#exit
SE2A5-AP1(config)#interface g0.164
SE2A5-AP1(config-subif)#encapsulation dot1q 164
SE2A5-AP1(config-subif)#bridge-group 64
SE2A5-AP1(config-subif)#exit
SE2A5-AP1(config)#interface dot11radio 0
SE2A5-AP2(config-if)#no shutdown
SE2A5-AP1(config-if)#encryption vlan 164 mode ciphers aes-ccm tkip
SE2A5-AP1(config-if)#mbssid
SE2A5-AP1(config-if)#ssid DEMINEUR1
SE2A5-AP1(config-if)#exit
```

#### Point d'accès Wifi n°2

##### Configuration de base

```
ap>enable
ap#configure terminal
```
* Configuration du nom d’hôte
```
ap(config)#hostname SE2A5-AP2
```
* Accès SSH
```
SE2A5-AP2(config)#aaa new-model
SE2A5-AP2(config)#username admin privilege 15 secret glopglop
SE2A5-AP2(config)#ip domain-name plil.info
SE2A5-AP2(config)#crypto key generate rsa general-keys modulus 2048
SE2A5-AP2(config)#ip ssh version 2
SE2A5-AP2(config)#line vty 0 15
SE2A5-AP2(config-line)#transport input ssh
SE2A5-AP2(config-line)#exit
```
* Accès console
```
SE2A5-AP2(config)#line console 0
SE2A5-AP2(config-line)#password glopglop
SE2A5-AP2(config-line)#login authentification AAA_CONSOLE
SE2A5-AP2(config-line)#exit
```
* Sécurisation des accès
```
SE2A5-AP2(config)#service password-encryption
SE2A5-AP2(config)#enable secret glopglop
SE2A5-AP2(config)#banner motd #Restricted Access#
```

##### VLAN 164

* VLAN 164
```
SE2A5-AP2(config)#aaa authentication login EAP_DEMINEUR group RADIUS_DEMINEUR
SE2A5-AP2(config)#radius-server host 193.48.57.164 auth-port 1812 acct-port 1813 key glopglop
SE2A5-AP2(config)#aaa group server radius RADIUS_DEMINEUR
SE2A5-AP2(config-server)#server 193.48.57.164 auth-port 1812 acct-port 1813
SE2A5-AP2(config-server)#exit
SE2A5-AP2(config)#dot11 ssid DEMINEUR2
SE2A5-AP2(config-ssid)#mbssid guest-mode
SE2A5-AP2(config-ssid)#vlan 164
SE2A5-AP2(config-ssid)#authentication open eap EAP_DEMINEUR
SE2A5-AP2(config-ssid)#authentication network-eap EAP_DEMINEUR
SE2A5-AP2(config-ssid)#authentication key-management wpa
SE2A5-AP2(config-ssid)#exit
SE2A5-AP2(config)#interface dot11radio0.164
SE2A5-AP2(config-subif)#encapsulation dot1q 164
SE2A5-AP2(config-subif)#bridge-group 64
SE2A5-AP2(config-subif)#exit
SE2A5-AP2(config)#interface g0.164
SE2A5-AP2(config-subif)#encapsulation dot1q 164
SE2A5-AP2(config-subif)#bridge-group 64
SE2A5-AP2(config-subif)#exit
SE2A5-AP2(config)#interface dot11radio 0
SE2A5-AP2(config-if)#no shutdown
SE2A5-AP2(config-if)#encryption vlan 164 mode ciphers aes-ccm tkip
SE2A5-AP2(config-if)#mbssid
SE2A5-AP2(config-if)#ssid DEMINEUR2
SE2A5-AP2(config-if)#exit
```

## Machine virtuelle sur le serveur Capbreton

* Connexion au serveur Capbreton:
```
ssh capbreton.plil.info
```

* Créer une image xen:
```
xen-create-image --hostname=demineur --ip=10.60.100.164 --gateway=10.60.100.254 --netmask=255.255.255.0 --dir=/usr/local/xen --password=pasglop --dist=buster
```

* Création d'une partition de 10Go pour la machine virtuelle:
```
lvcreate -L10G -n demineur storage
```

* Formatage de la partition au format EXT4:
```
mkfs.ext4 /dev/storage/demineur
```

* Modifier le fichier de configuration de la VM:
```
disk = [
'file:/usr/local/xen/domains/demineur/swap.img,xvda1,w',
'file:/usr/local/xen/domains/demineur/disk.img,xvda2,w',
'phy:/dev/storage/demineur,xvda3,w',
]
```

* Création de la VM:
```
xl create -c /etc/xen/demineur.cfg
```

## Résumé des séances

### Jeudi 16/09/2021 10h-12h

**Tâches effectuées :**
* Plan d'adressage
* Architecture réseau
* Câblage des fibres

### Jeudi 23/09/2021 08h-12h

**Tâches effectuées :**
* Câblage des câbles coaxiaux
* Configuration de base des trois routeurs
* Configuration du VLAN 530 sur les deux routeurs principaux
  * La communication avec le routeur en amont (192.168.222.33) est fonctionnelle
  * Le routeur répond correctement à la sollicitation ICMP par la commande PING

### Vendredi 24/09/2021 08h-12h

**Tâches effectuées :**
* Configuration du VLAN 110 sur les deux routeurs principaux
* Configuration de OSPF
* Configuration de VRRP pour déterminer le routeur actif sur le réseau
  * VRRP ne permet pas de choisir une adresse IP en dehors du sous-réseau déclaré
  * Le sous-réseau 10.60.100.0/24 est utilisé dans le VLAN 110 pour avoir davantage d'addresses et pour pouvoir utiliser VRRP
  * Ce sous-réseau n'est pas redistribué via OSPF

### Jeudi 26/09/2021 08h-12h

**Tâches effectuées :**
* Configuration des routeurs Cisco 9200 et 6509-E
  * Tests de connectivité avec Internet fonctionnels
    * L'implémentation du protocole NAT sur le Cisco 6509-E a été effectuée
    * Il a fallu ajouter la dernière adresse du réseau 193.48.57.160/28 sur l'interface loopback 0 afin d'activer la redistribution par OSPF
    * Les paquets ICMP et UDP sont correctement échangés mais pas ceux TCP
    * Le commutateur Cisco 9200 n'implémente pas le protocole NAT
    * La solution trouvée est de passer par des routes statiques
    * Sauf si une solution est trouvée, le routeur Cisco 6509-E implémentera également des routes statiques plutôt que d'utiliser le protocole NAT
* Configuration IPv6
* La redondance est fonctionnelle : Le commutateur Cisco 9200 prend le relais sur le routeur Cisco 6509-E si celui-ci ne fonctionne plus
* Configuration des interfaces vers le routeur Cisco ISR 4331 et les points d'accès
* Le routeur Cisco ISR 4331 sera connecté au commutateur SR52-pinfo-1 sur l'interface G0/39 (l'interface a été configuré pour commuter le VLAN 532)

### Mercredi 03/11/2021 14h-18h

**Tâches effectuées :**

### Vendredi 05/11/2021 08h-12h

**Tâches effectuées :**

### Vendredi 12/11/2021 08h-12h

**Tâches effectuées :**

### Vendredi 19/11/2021 08h-12h

**Tâches effectuées :**
