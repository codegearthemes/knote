<?php

if ( ! defined( 'ABSPATH' ) ) { die; }

function knote_admin_header(){ ?>
    <div class="section-header">
        <div class="header">
            <div class="header-left">
                <div class="header-column header-logo">
                    <div class="branding">
                        <a href="<?php echo esc_url('https://codegearthemes.com/'); ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="220" viewBox="0 0 1208 282" fill="none">
                                <path d="M323.47 106.441C328.076 98.3245 334.313 92.1892 342.182 88.0351C350.242 83.7532 359.294 81.6122 369.338 81.6122C379.061 81.6122 387.601 83.4337 394.958 87.0765C402.507 90.7832 408.36 95.9599 412.518 102.606C416.74 109.317 419.043 117.178 419.427 126.189H391.792C391.728 118.776 389.617 112.992 385.458 108.838C381.492 104.875 376.119 102.894 369.338 102.894C361.725 102.894 355.808 105.674 351.586 111.234C347.3 116.858 345.157 124.527 345.157 134.242C345.157 145.17 347.3 153.542 351.586 159.358C355.872 165.174 361.789 168.082 369.338 168.082C376.375 168.082 381.812 166.005 385.65 161.85C389.489 157.76 391.536 151.849 391.792 144.116H419.427C419.107 153.958 416.74 162.17 412.326 168.753C407.848 175.463 401.803 180.544 394.19 183.995C386.45 187.51 378.166 189.268 369.338 189.268C359.486 189.268 350.562 187.254 342.566 183.228C334.505 179.138 328.204 173.067 323.662 165.014C318.992 156.77 316.657 146.64 316.657 134.625C316.657 123.824 318.928 114.43 323.47 106.441Z" fill="#190C39"/>
                                <path d="M455.795 182.653C447.223 178.179 440.538 171.884 435.74 163.768C430.814 155.46 428.351 145.905 428.351 135.104C428.351 124.559 430.814 115.197 435.74 107.016C440.602 98.9636 447.287 92.7005 455.795 88.2269C464.239 83.8171 473.579 81.6122 483.814 81.6122C494.113 81.6122 503.421 83.8171 511.738 88.2269C520.118 92.6366 526.739 98.8997 531.601 107.016C536.526 115.197 538.989 124.559 538.989 135.104C538.989 146.033 536.558 155.587 531.697 163.768C526.835 172.012 520.214 178.307 511.833 182.653C503.389 187.063 494.049 189.268 483.814 189.268C473.579 189.268 464.239 187.063 455.795 182.653ZM503.581 159.646C508.315 154.085 510.682 145.905 510.682 135.104C510.682 124.495 508.315 116.507 503.581 111.138C498.783 105.642 492.194 102.894 483.814 102.894C475.306 102.894 468.653 105.642 463.855 111.138C459.057 116.635 456.658 124.623 456.658 135.104C456.658 145.841 459.057 154.022 463.855 159.646C468.653 165.27 475.306 168.082 483.814 168.082C492.194 168.082 498.783 165.27 503.581 159.646Z" fill="#190C39"/>
                                <path d="M630.82 48.635H658.743V186.104H631.779L630.82 158.016H629.86C626.982 168.369 622.152 176.198 615.371 181.503C608.59 186.807 600.913 189.459 592.341 189.459C584.025 189.459 576.604 187.254 570.079 182.845C563.49 178.371 558.405 172.14 554.822 164.151C551.112 155.843 549.257 146.416 549.257 135.871C549.257 125.135 551.112 115.612 554.822 107.304C558.469 99.1234 563.554 92.8283 570.079 88.4186C576.54 84.0728 583.961 81.8998 592.341 81.8998C601.041 81.8998 608.718 84.5521 615.371 89.8566C622.152 95.2888 626.982 103.15 629.86 113.439H630.82V48.635ZM623.527 162.042C628.389 156.802 630.82 150.027 630.82 141.719V129.736C630.82 121.428 628.389 114.621 623.527 109.317C618.601 103.949 612.204 101.264 604.336 101.264C596.211 101.264 589.686 104.3 584.761 110.371C579.835 116.443 577.372 124.943 577.372 135.871C577.372 146.48 579.835 154.82 584.761 160.892C589.686 166.963 596.211 169.999 604.336 169.999C612.204 169.999 618.601 167.347 623.527 162.042Z" fill="#190C39"/>
                                <path d="M777.442 141.144H700.005C700.069 149.452 702.692 156.067 707.873 160.988C712.927 165.845 719.452 168.273 727.448 168.273C733.59 168.273 738.931 166.644 743.473 163.384C747.759 160.317 750.606 156.163 752.013 150.922H776.386C775.299 159.294 772.292 166.324 767.366 172.012C762.313 177.828 756.299 182.142 749.327 184.954C742.226 187.83 734.933 189.268 727.448 189.268C710.816 189.268 697.606 184.538 687.818 175.08C678.095 165.685 673.233 152.36 673.233 135.104C673.233 124.559 675.408 115.197 679.758 107.016C684.044 98.8997 690.121 92.6366 697.99 88.2269C705.858 83.8171 715.102 81.6122 725.721 81.6122C736.212 81.6122 745.392 83.913 753.261 88.5145C761.065 93.052 767.047 99.2512 771.205 107.112C775.363 114.909 777.442 123.569 777.442 133.091V141.144ZM707.681 108.742C703.011 112.768 700.453 118.52 700.005 125.997H749.902C749.454 118.712 746.928 112.992 742.322 108.838C737.844 104.747 732.118 102.702 725.145 102.702C718.109 102.702 712.287 104.715 707.681 108.742Z" fill="#190C39"/>
                                <path d="M892.974 88.8979L857.086 82.6667L856.894 84.0088C864.507 85.8622 870.744 89.569 875.606 95.1291C880.404 100.561 882.802 107.144 882.802 114.877C882.802 125.358 878.804 133.634 870.808 139.706C862.811 145.777 851.744 148.813 837.607 148.813C832.233 148.813 826.988 148.27 821.87 147.183C818.799 148.142 816.688 149.26 815.537 150.538C814.257 151.944 813.618 153.67 813.618 155.715C813.618 158.144 814.737 160.125 816.976 161.659C819.215 163.193 822.286 163.959 826.188 163.959H854.111C866.778 163.959 876.309 166.356 882.706 171.149C889.168 176.006 892.398 183.995 892.398 195.115C892.398 206.044 887.92 214.224 878.964 219.656C869.88 225.153 856.606 227.901 839.142 227.901C820.463 227.901 807.125 225.983 799.128 222.149C791.132 218.314 787.134 212.467 787.134 204.606C787.134 193.422 796.281 187.063 814.577 185.529V184.762C806.773 183.995 800.791 181.822 796.633 178.243C792.475 174.664 790.396 170.478 790.396 165.685C790.396 159.55 792.763 154.948 797.497 151.881C802.231 148.749 808.724 147.055 816.976 146.8V146.033C808.916 143.477 802.774 139.546 798.552 134.242C794.33 128.873 792.219 122.418 792.219 114.877C792.219 105.866 795.354 98.5482 801.623 92.9242C807.956 87.3002 818.703 83.0822 833.865 80.2701C851.265 77.0108 870.968 72.9525 892.974 68.0954V88.8979ZM851.904 104.907C848.578 102.351 843.812 101.073 837.607 101.073C831.338 101.073 826.54 102.351 823.213 104.907C819.823 107.527 818.128 110.851 818.128 114.877C818.128 119.159 819.823 122.642 823.213 125.326C826.604 128.01 831.402 129.353 837.607 129.353C843.748 129.353 848.514 128.01 851.904 125.326C855.359 122.578 857.086 119.095 857.086 114.877C857.086 110.915 855.359 107.591 851.904 104.907ZM820.335 184.954C814.129 187.063 811.027 190.706 811.027 195.882C811.027 199.845 813.266 202.88 817.744 204.989C822.03 207.034 829.163 208.057 839.142 208.057C849.505 208.057 856.766 207.066 860.924 205.085C865.146 203.04 867.257 199.845 867.257 195.499C867.257 191.728 866.01 188.98 863.515 187.254C861.084 185.593 857.086 184.762 851.521 184.762L820.335 184.954Z" fill="#190C39"/>
                                <path d="M1004.28 141.144H926.847C926.911 149.452 929.533 156.067 934.715 160.988C939.769 165.845 946.294 168.273 954.29 168.273C960.431 168.273 965.773 166.644 970.315 163.384C974.601 160.317 977.448 156.163 978.855 150.922H1003.23C1002.14 159.294 999.134 166.324 994.208 172.012C989.155 177.828 983.141 182.142 976.168 184.954C969.068 187.83 961.775 189.268 954.29 189.268C937.658 189.268 924.448 184.538 914.66 175.08C904.936 165.685 900.075 152.36 900.075 135.104C900.075 124.559 902.25 115.197 906.6 107.016C910.886 98.8997 916.963 92.6366 924.832 88.2269C932.7 83.8171 941.944 81.6122 952.563 81.6122C963.054 81.6122 972.234 83.913 980.103 88.5145C987.907 93.052 993.888 99.2512 998.047 107.112C1002.2 114.909 1004.28 123.569 1004.28 133.091V141.144ZM934.523 108.742C929.853 112.768 927.294 118.52 926.847 125.997H976.744C976.296 118.712 973.769 112.992 969.164 108.838C964.686 104.747 958.96 102.702 951.987 102.702C944.95 102.702 939.129 104.715 934.523 108.742Z" fill="#190C39"/>
                                <path d="M1024.53 139.61C1031.25 134.369 1041.52 131.813 1055.33 131.941C1067.87 132.005 1076.64 130.95 1081.62 128.777C1086.61 126.604 1089.11 122.93 1089.11 117.753C1089.11 113.727 1087.41 110.212 1084.02 107.208C1080.63 104.204 1075.26 102.702 1067.9 102.702C1060.35 102.702 1054.47 104.715 1050.25 108.742C1046.09 112.704 1043.66 118.136 1042.95 125.039H1015.22C1015.61 117.05 1017.81 109.796 1021.84 103.278C1025.94 96.6309 1031.79 91.3904 1039.4 87.5558C1047.21 83.5934 1056.64 81.6122 1067.71 81.6122C1084.02 81.6122 1096.27 85.319 1104.46 92.7325C1112.59 100.082 1116.65 109.605 1116.65 121.3V186.104H1089.88L1089.11 154.469H1088.15C1086.81 165.717 1082.62 174.313 1075.58 180.256C1068.54 186.264 1059.55 189.268 1048.62 189.268C1038.38 189.268 1030.1 186.871 1023.76 182.078C1017.43 177.285 1014.26 170.318 1014.26 161.179C1014.26 152.104 1017.69 144.914 1024.53 139.61ZM1046.6 167.794C1049.16 169.903 1053.06 170.958 1058.31 170.958C1063.74 170.958 1068.83 169.647 1073.56 167.027C1078.36 164.407 1082.14 160.956 1084.89 156.674C1087.7 152.328 1089.11 147.726 1089.11 142.869V127.435H1088.15C1087.45 131.781 1086.1 135.232 1084.12 137.789C1082.01 140.473 1078.81 142.518 1074.52 143.924C1070.11 145.33 1063.97 146.289 1056.1 146.8C1051.88 147.119 1048.58 148.302 1046.22 150.347C1043.79 152.456 1042.57 155.268 1042.57 158.783C1042.57 162.553 1043.91 165.557 1046.6 167.794Z" fill="#190C39"/>
                                <path d="M1164.53 123.697C1166 113.599 1168.31 105.546 1171.44 99.5388C1174.45 93.787 1178.8 89.6009 1184.49 86.9806C1190.25 84.3603 1198.08 83.0502 1208 83.0502V106.633C1196.93 107.336 1188.36 108.806 1182.28 111.042C1175.95 113.407 1171.34 117.114 1168.47 122.163C1165.46 127.403 1163.76 134.785 1163.38 144.307V186.104H1135.46V84.7758H1162.61L1163.38 123.697H1164.53Z" fill="#190C39"/>
                                <path d="M940.504 282H924.128V219.305H940.504V224.929H930.621V276.376H940.504V282Z" fill="#190C39"/>
                                <path d="M981.19 224.13V230.106H965.773V269.953H958.768V230.106H943.383V224.13H981.19Z" fill="#190C39"/>
                                <path d="M1010.46 236.688C1012.31 237.711 1013.77 239.17 1014.84 241.066C1015.88 242.941 1016.41 245.156 1016.41 247.713V269.953H1009.79V249.79C1009.79 246.999 1009.02 244.805 1007.48 243.207C1005.97 241.631 1003.88 240.842 1001.21 240.842C998.356 240.842 996.042 241.897 994.272 244.006C992.524 246.094 991.649 248.916 991.649 252.474V269.953H984.964V224.13H991.649V246.147H992.033C992.481 242.824 993.814 240.161 996.031 238.158C998.292 236.134 1001 235.123 1004.16 235.123C1006.46 235.123 1008.56 235.644 1010.46 236.688Z" fill="#190C39"/>
                                <path d="M1055.49 254.231H1028.62C1028.65 257.789 1029.67 260.59 1031.7 262.635C1033.68 264.638 1036.24 265.639 1039.37 265.639C1041.85 265.639 1043.94 264.936 1045.64 263.53C1047.3 262.146 1048.38 260.356 1048.87 258.162H1055.17C1054.85 260.718 1053.96 262.976 1052.49 264.936C1051.01 266.875 1049.13 268.377 1046.82 269.442C1044.54 270.486 1042.06 271.008 1039.37 271.008C1034.1 271.008 1029.91 269.452 1026.8 266.342C1023.71 263.253 1022.16 258.79 1022.16 252.953C1022.16 249.246 1022.86 246.072 1024.24 243.431C1025.67 240.683 1027.65 238.627 1030.19 237.263C1032.81 235.836 1035.79 235.123 1039.12 235.123C1042.34 235.123 1045.19 235.857 1047.69 237.327C1050.2 238.819 1052.12 240.8 1053.45 243.271C1054.81 245.827 1055.49 248.639 1055.49 251.707V254.231ZM1031.76 243.015C1029.88 244.72 1028.84 247.084 1028.62 250.109H1048.87C1048.66 247.148 1047.67 244.805 1045.9 243.079C1044.15 241.354 1041.8 240.491 1038.86 240.491C1035.96 240.491 1033.59 241.332 1031.76 243.015Z" fill="#190C39"/>
                                <path d="M1111.85 238.542C1113.98 240.8 1115.05 243.793 1115.05 247.521V269.953H1108.49V249.79C1108.49 247.042 1107.78 244.858 1106.35 243.239C1104.94 241.641 1102.99 240.842 1100.5 240.842C1097.79 240.842 1095.62 241.897 1094 244.006C1092.36 246.136 1091.54 248.959 1091.54 252.474V269.953H1084.92V249.79C1084.92 247.084 1084.21 244.901 1082.78 243.239C1081.39 241.641 1079.46 240.842 1076.99 240.842C1074.26 240.842 1072.07 241.897 1070.43 244.006C1068.83 246.072 1068.03 248.895 1068.03 252.474V269.953H1061.41L1061.35 236.241H1067.68L1068.03 246.147H1068.41C1068.86 242.76 1070.15 240.086 1072.29 238.126C1074.46 236.124 1077.03 235.123 1079.99 235.123C1083.15 235.123 1085.79 236.124 1087.93 238.126C1090.04 240.107 1091.22 242.781 1091.48 246.147H1091.92C1092.37 242.76 1093.66 240.086 1095.79 238.126C1097.97 236.124 1100.55 235.123 1103.54 235.123C1106.93 235.123 1109.7 236.262 1111.85 238.542Z" fill="#190C39"/>
                                <path d="M1154.14 254.231H1127.27C1127.29 257.789 1128.31 260.59 1130.34 262.635C1132.32 264.638 1134.88 265.639 1138.02 265.639C1140.49 265.639 1142.58 264.936 1144.28 263.53C1145.95 262.146 1147.02 260.356 1147.52 258.162H1153.82C1153.5 260.718 1152.6 262.976 1151.13 264.936C1149.66 266.875 1147.77 268.377 1145.47 269.442C1143.19 270.486 1140.7 271.008 1138.02 271.008C1132.75 271.008 1128.56 269.452 1125.45 266.342C1122.35 263.253 1120.81 258.79 1120.81 252.953C1120.81 249.246 1121.5 246.072 1122.89 243.431C1124.32 240.683 1126.3 238.627 1128.84 237.263C1131.46 235.836 1134.43 235.123 1137.76 235.123C1140.98 235.123 1143.84 235.857 1146.33 237.327C1148.85 238.819 1150.77 240.8 1152.09 243.271C1153.45 245.827 1154.14 248.639 1154.14 251.707V254.231ZM1130.4 243.015C1128.53 244.72 1127.48 247.084 1127.27 250.109H1147.52C1147.3 247.148 1146.31 244.805 1144.54 243.079C1142.79 241.354 1140.45 240.491 1137.5 240.491C1134.6 240.491 1132.24 241.332 1130.4 243.015Z" fill="#190C39"/>
                                <path d="M1161.91 267.876C1159.14 265.81 1157.64 262.88 1157.43 259.089H1164.12C1164.29 261.304 1165.18 262.966 1166.8 264.073C1168.44 265.203 1170.72 265.767 1173.62 265.767C1176.03 265.767 1177.94 265.33 1179.37 264.457C1180.78 263.583 1181.48 262.38 1181.48 260.846C1181.48 259.696 1181.13 258.801 1180.43 258.162C1179.7 257.501 1178.5 257.001 1176.81 256.66L1167.57 254.583C1164.69 253.944 1162.41 252.836 1160.73 251.26C1159.1 249.726 1158.29 247.755 1158.29 245.348C1158.29 242.238 1159.57 239.767 1162.13 237.935C1164.76 236.06 1168.23 235.123 1172.56 235.123C1177.23 235.123 1180.94 236.188 1183.69 238.318C1186.4 240.427 1187.75 243.335 1187.75 247.042H1181.2C1181.2 244.954 1180.45 243.324 1178.96 242.153C1177.44 240.96 1175.35 240.363 1172.69 240.363C1170.24 240.363 1168.32 240.789 1166.93 241.641C1165.52 242.493 1164.82 243.665 1164.82 245.156C1164.82 246.158 1165.22 247.042 1166.03 247.809C1166.8 248.533 1167.93 249.065 1169.43 249.406L1178.73 251.483C1181.97 252.208 1184.36 253.294 1185.9 254.743C1187.39 256.149 1188.14 258.098 1188.14 260.59C1188.14 263.828 1186.85 266.374 1184.27 268.228C1181.67 270.081 1178.09 271.008 1173.55 271.008C1168.58 271.008 1164.7 269.964 1161.91 267.876Z" fill="#190C39"/>
                                <path d="M1206.88 219.305V282H1190.5V276.376H1200.39V224.929H1190.5V219.305H1206.88Z" fill="#190C39"/>
                                <path d="M273.31 116.217L237.538 110.38C235.438 103.218 232.59 96.3206 228.993 89.7851L249.872 60.0496C251.562 57.638 251.272 54.3823 249.196 52.3083L225.662 28.7949C223.562 26.6968 220.255 26.4315 217.841 28.1679L188.538 49.2214C181.949 45.5798 174.997 42.6859 167.78 40.5878L161.529 5.01619C161.022 2.12224 158.511 0 155.567 0H122.281C119.312 0 116.778 2.14635 116.319 5.06443L110.526 40.4672C103.261 42.5653 96.2848 45.411 89.7194 49.0044L60.4888 28.1437C58.075 26.4315 54.7923 26.6968 52.6923 28.7949L29.1582 52.3083C27.0824 54.3823 26.7927 57.638 28.4824 60.0496L49.0476 89.4474C45.3787 96.0794 42.458 103.073 40.3339 110.38L5.06889 116.217C2.14824 116.699 0 119.231 0 122.173V155.43C0 158.372 2.09997 160.88 4.99647 161.386L40.2856 167.633C42.4097 174.916 45.3062 181.909 48.9993 188.565L28.1686 217.674C26.4548 220.086 26.7203 223.365 28.8203 225.463L52.3544 249.001C54.4302 251.075 57.7129 251.364 60.1026 249.676L89.5745 229.057C96.1882 232.698 103.188 235.568 110.429 237.666L116.343 273.093C116.826 276.011 119.336 278.133 122.305 278.133H155.591C158.536 278.133 161.046 276.035 161.553 273.141L167.877 237.522C175.142 235.375 182.094 232.481 188.635 228.84L218.324 249.652C220.738 251.34 223.997 251.051 226.072 248.977L249.607 225.439C251.706 223.341 251.972 220.037 250.234 217.626L229.065 188.252C232.662 181.716 235.51 174.819 237.586 167.657L273.406 161.362C276.303 160.856 278.403 158.348 278.403 155.406V122.197C278.378 119.231 276.23 116.699 273.31 116.217ZM139.201 181.403C115.812 181.403 96.8399 162.448 96.8399 139.079C96.8399 115.71 115.812 96.7547 139.201 96.7547C162.591 96.7547 181.563 115.71 181.563 139.079C181.563 162.448 162.591 181.403 139.201 181.403Z" fill="#190C39"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="header-right">

            </div>
        </div>
    </div>
<?php
}
add_action( 'knote_admin_content_before', 'knote_admin_header', 15 );
